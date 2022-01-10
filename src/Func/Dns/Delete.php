<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainSublist.
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
