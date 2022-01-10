<?php

declare(strict_types = 1);

namespace IspApi\Credentials;

interface CredentialsInterface
{
    public function getLogin(): string;

    public function getPassword(): string;
}
