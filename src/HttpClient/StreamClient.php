<?php

declare(strict_types = 1);

namespace IspApi\HttpClient;

use Exception;
use function fclose;
use function fopen;
use function fread;
use function http_build_query;
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
            $response   = '';
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

    private function prepareParams(): array
    {
        $header = $this->params->getHeader();
        if (HttpClientParams::HTTP_METHOD_POST === $this->params->getMethod()) {
            return [
                'http' => [
                    'method'  => $this->params->getMethod(),
                    'header'  => $header[0],
                    'content' => urldecode(http_build_query($this->params->getContent())),
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
