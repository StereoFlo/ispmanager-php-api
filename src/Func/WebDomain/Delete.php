<?php

declare(strict_types = 1);

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

class Delete extends AbstractFunc
{
    protected string $func = 'webdomain.delete';

    public function __construct(string $domain)
    {
        parent::__construct($domain);
    }
}
