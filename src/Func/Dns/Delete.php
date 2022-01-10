<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;

class Delete extends AbstractFunc
{
    protected string $func       = 'domain.delete';
    protected bool $isSaveAction = true;
    protected array $additional  = [
        'webdomain' => 'on',
        'extop'     => 'on',
    ];
}
