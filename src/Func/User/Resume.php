<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:06.
 */

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

class Resume extends AbstractFunc
{
    protected $func = 'user.resume';

    /**
     * Edit constructor.
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
