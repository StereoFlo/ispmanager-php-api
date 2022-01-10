<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:05.
 */

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

class Suspend extends AbstractFunc
{
    protected $func = 'webdomain.suspend';

    /**
     * Edit constructor.
     */
    public function __construct(string $domain)
    {
        parent::__construct($domain);
    }
}
