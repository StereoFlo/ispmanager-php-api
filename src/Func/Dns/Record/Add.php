<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns\Record;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainAddItem.
 */
class Add extends AbstractFunc
{
    /**
     * @var string
     */
    protected $func = 'domain.sublist.edit';

    /**
     * @var bool
     */
    protected $isSaveAction = true;
}
