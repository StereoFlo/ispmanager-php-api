<?php

namespace IspApi\User;

/**
 * Interface UserInterface
 * @package IspApi\User
 */
interface UserInterface
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