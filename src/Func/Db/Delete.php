<?php

declare(strict_types = 1);

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Delete extends AbstractFunc
{
    protected string $func = 'db.delete';

    public function __construct(string $nameAndServer)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($nameAndServer);
    }
}
