<?php

declare(strict_types = 1);

namespace IspApi\Server;

/**
 * Interface ServerInterface.
 */
interface ServerInterface
{
    public function getHost(): string;

    public function getPort(): int;

    public function getSchema(): string;
}
