<?php

declare(strict_types = 1);

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected string $func = 'user.edit';

    public function __construct(string $name)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($name);
    }

    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->additional['passwd']  = $password;
        $this->additional['confirm'] = $password;

        return $this;
    }
}
