<?php

namespace IspApi\Func;

/**
 * Class DomainSublist
 * @package IspApi\Func
 */
class DomainDelete extends AbstractFunc
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