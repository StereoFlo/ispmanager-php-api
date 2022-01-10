<?php

declare(strict_types = 1);

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Dump extends AbstractFunc
{
    protected string $func = 'db.dump';

    public function __construct(string $nameAndServer)
    {
        parent::__construct($nameAndServer);
    }
}
