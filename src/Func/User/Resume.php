<?php

declare(strict_types = 1);

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

class Resume extends AbstractFunc
{
    protected string $func = 'user.resume';

    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
