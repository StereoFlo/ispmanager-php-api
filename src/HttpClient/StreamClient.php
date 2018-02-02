<?php

namespace IspApi\HttpClient;

/**
 * Class StreamClient
 * @package IspApi\HttpClient
 */
class StreamClient implements HttpClientInterface
{
    /**
     * @var string
     */
    private $url = '';

    /**
     * @var array
     */
    private $params = [];

    /**
     * @param string $url
     *
     * @return StreamClient
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param array $params
     *
     * @return StreamClient
     */
    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function get(): array
    {
        try {
            $connection = \fopen($this->url, 'rb', false, \stream_context_create($this->params));
            $response = '';
            while ($data = \fread($connection, 4096)) {
                $response .= $data;
            }
            \fclose($connection);
            $response = \json_decode($response, true);
        } catch (\Exception $exception) {
            $response = [];
        }
        return $response;
    }
}