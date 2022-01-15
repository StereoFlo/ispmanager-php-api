<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns\Record;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainAddItem.
 */
class Add extends AbstractFunc
{
    protected string $func       = 'domain.sublist.edit';
    protected bool $isSaveAction = true;
}
