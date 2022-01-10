<?php

declare(strict_types = 1);

namespace IspApi\Func\Soa;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainSoaEdit.
 */
class Edit extends AbstractFunc
{
    protected $isSaveAction = true;
    protected $func         = 'soa.edit';
}
