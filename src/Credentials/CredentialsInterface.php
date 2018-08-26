<?php

namespace IspApi\Credentials;

/**
 * Interface CredentialsInterface
 * @package IspApi\User
 */
interface CredentialsInterface
{
    /**
     * @return string
     */
    public function getLogin(): string;

    /**
     * @return string
     */
    public function getPassword(): string;
}
