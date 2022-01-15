<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 3:55.
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Delete extends AbstractFunc
{
    protected string $func = 'ftp.user.delete';

    /**
     * Edit constructor.
     */
    public function __construct(string $name)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($name);
    }
}
