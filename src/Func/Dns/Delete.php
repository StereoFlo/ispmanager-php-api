<?php

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainSublist
 * @package IspApi\Func
 */
class Delete extends AbstractFunc
{
    /**
     * @var string
     */
    protected $func = 'domain.delete';

    /**
     * @var bool
     */
    protected $isSaveAction = true;

    /**
     * @var array
     */
    protected $additional = [
        'webdomain' => 'on',
        'extop'     => 'on',
    ];
}
