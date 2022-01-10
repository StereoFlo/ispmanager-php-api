<?php

declare(strict_types = 1);

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

class Suspend extends AbstractFunc
{
    protected string $func = 'webdomain.suspend';

    public function __construct(string $domain)
    {
        parent::__construct($domain);
    }
}
