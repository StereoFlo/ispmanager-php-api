<?php

declare(strict_types = 1);

namespace IspApi\HttpClient;

class HttpClientParams
{
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_GET  = 'GET';

    private string $url;
    private string $method;

    /**
     * @var array<string, mixed>
     */
    private array $header;

    /**
     * @var mixed[]|null
     */
    private ?array $content;
    /**
     * @param array<mixed>              $header
     * @param array<string, mixed>|null $content
     */
    public function __construct(string $url, string $method = self::HTTP_METHOD_GET, array $header, ?array $content = null)
    {
        $this->url     = $url;
        $this->method  = $method;
        $this->header  = $header;
        $this->content = $content;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed[]
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @return mixed[]|null
     */
    public function getContent(): ?array
    {
        return $this->content;
    }
}
