<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;
use function str_replace;

/**
 * Class DomainSublist.
 */
class Add extends AbstractFunc
{
    /**
     * @var string
     */
    protected $func = 'domain.edit';

    /**
     * @var bool
     */
    protected $isSaveAction = true;

    /**
     * Format for this array:.
     *
     * @var array
     */
    protected $additional = [];

    public function setAdditional(array $additional): AbstractFunc
    {
        if (isset($additional['ns'])) {
            $additional['ns'] = str_replace(' ', '+', $additional['ns']);
        }

        return parent::setAdditional($additional);
    }
}
