<?php

declare(strict_types = 1);

namespace IspApi\HttpClient;

interface HttpClientInterface
{
    public function setParams(HttpClientParams $params): self;

    public function get(): string;
}
