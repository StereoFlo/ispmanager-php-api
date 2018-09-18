<?php

namespace IspApi\Func\Dns;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainSublist
 * @package IspApi\Func
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
     * Format for this array:
     *
    [
        'name'    => 'domain.ru',
        'ip'      => '127.0.0.1',
        'ns'      => 'dns3.domain.net.+dns1.domain.net.+dns2.domain.net.',
        'ns_list' => '',
        'mx'      => 'mail',
        'mx_list' => '',
        'elid'    => '',
        'sok'     => 'ok',
    ]
     *
     * @var array
     */
    protected $additional = [];

    /**
     * @param array $additional
     *
     * @return AbstractFunc
     */
    public function setAdditional(array $additional): AbstractFunc
    {
        if (isset($additional['ns'])) {
            $additional['ns'] = \str_replace(' ', '+', $additional['ns']);
        }
        return parent::setAdditional($additional);
    }
}
