<?php

namespace IspApi\HttpClient;

/**
 * Class HttpClientParams
 * @package IspApi\HttpClient
 */
class HttpClientParams
{
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_GET  = 'GET';

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $header;

    /**
     * @var null|array
     */
    private $content;

    /**
     * HttpClientParams constructor.
     *
     * @param string      $url
     * @param string      $method
     * @param array       $header
     * @param null|array  $content
     */
    public function __construct(string $url, string $method = self::HTTP_METHOD_GET, array $header, ?array $content = null)
    {
        $this->url     = $url;
        $this->method  = $method;
        $this->header  = $header;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @return null|array
     */
    public function getContent(): ?array
    {
        return $this->content;
    }
}
