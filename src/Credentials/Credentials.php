<?php

namespace IspApi\Credentials;

/**
 * Class User
 * @package IspApi\User
 */
class Credentials implements CredentialsInterface
{
    /**
     * @var string
     */
    private $login = '';

    /**
     * @var string
     */
    private $password = '';

    /**
     * User constructor.
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
