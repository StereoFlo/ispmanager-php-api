<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns\Soa;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected bool $isSaveAction = true;
    protected string $func       = 'soa.edit';
}
