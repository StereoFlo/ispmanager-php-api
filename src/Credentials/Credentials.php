<?php

declare(strict_types = 1);

namespace IspApi\Credentials;

class Credentials implements CredentialsInterface
{
    private string $login;
    private string $password;

    public function __construct(string $login, string $password)
    {
        $this->login    = $login;
        $this->password = $password;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
