<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;
use function str_replace;

class Add extends AbstractFunc
{
    protected string $func       = 'domain.edit';
    protected bool $isSaveAction = true;
    protected array $additional  = [];

    public function setAdditional(array $additional): AbstractFunc
    {
        if (isset($additional['ns'])) {
            $additional['ns'] = str_replace(' ', '+', $additional['ns']);
        }

        return parent::setAdditional($additional);
    }
}
