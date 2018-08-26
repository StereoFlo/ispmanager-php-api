<?php

namespace IspApi\Server;

class Server implements ServerInterface
{
    const SCHEMA_HTTP = 'http';
    const SCHEMA_HTTPS = 'https';

    /**
     * @var string
     */
    private $schema = self::SCHEMA_HTTPS;

    /**
     * @var string
     */
    private $host = '';

    /**
     * @var int
     */
    private $port = 0;

    /**
     * Server constructor.
     * @param string $host
     * @param int $port
     * @param string $schema
     */
    public function __construct(string $host, int $port = 0, $schema = self::SCHEMA_HTTPS)
    {
        $this->host = $host;
        if ($port) {
            $this->port = $port;
        }
        $this->schema = $schema;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getSchema(): string
    {
        return $this->schema;
    }
}
