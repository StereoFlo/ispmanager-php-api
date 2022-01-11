<?php

declare(strict_types = 1);

namespace IspApi\Server;

class Server implements ServerInterface
{
    public const SCHEMA_HTTP  = 'http';
    public const SCHEMA_HTTPS = 'https';

    private string $schema = self::SCHEMA_HTTPS;
    private string $host   = '';
    private int $port      = 0;

    public function __construct(string $host, int $port = 0, string $schema = self::SCHEMA_HTTPS)
    {
        $this->host = $host;
        if ($port) {
            $this->port = $port;
        }
        $this->schema = $schema;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function getPort(): int
    {
        return $this->port;
    }

    public function getSchema(): string
    {
        return $this->schema;
    }
}
