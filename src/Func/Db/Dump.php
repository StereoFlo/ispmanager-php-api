<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 5:33.
 */

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Dump extends AbstractFunc
{
    protected $func = 'db.dump';

    /**
     * Edit constructor.
     */
    public function __construct(string $nameAndServer)
    {
        parent::__construct($nameAndServer);
    }
}
