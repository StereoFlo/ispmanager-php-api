<?php

declare(strict_types = 1);

namespace IspApi\HttpClient;

use Exception;
use RuntimeException;
use function fclose;
use function fopen;
use function fread;
use function http_build_query;
use function is_bool;
use function json_decode;
use function stream_context_create;
use function urldecode;

class StreamClient implements HttpClientInterface
{
    public const DEFAULT_LENGTH = 4096;

    private HttpClientParams $params;

    public function setParams(HttpClientParams $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function get(): string
    {
        try {
            $connection = fopen($this->params->getUrl(), 'rb', false, stream_context_create($this->prepareParams()));
            if (is_bool($connection)) {
                throw new RuntimeException();
            }

            $response = '';
            while ($data = fread($connection, self::DEFAULT_LENGTH)) {
                $response .= $data;
            }
            fclose($connection);
            $response = json_decode($response, true);
        } catch (Exception $exception) {
            $response = [];
        }

        return $response;
    }

    /**
     * @return array<array<string, mixed>>
     */
    private function prepareParams(): array
    {
        $header  = $this->params->getHeader();
        $content = $this->params->getContent();
        if (HttpClientParams::HTTP_METHOD_POST === $this->params->getMethod() && $content) {
            return [
                'http' => [
                    'method'  => $this->params->getMethod(),
                    'header'  => $header[0],
                    'content' => urldecode(http_build_query($content)),
                ],
            ];
        }

        return [
            'http' => [
                'method' => $this->params->getMethod(),
                'header' => $header[0],
            ],
        ];
    }
}
