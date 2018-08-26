<?php

namespace IspApi\Server;

/**
 * Interface ServerInterface
 * @package IspApi\Server
 */
interface ServerInterface
{
    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @return int
     */
    public function getPort(): int;

    /**
     * @return string
     */
    public function getSchema(): string;
}
