<?php

namespace IspApi\Func;

/**
 * Class DomainDeleteItem
 * @package IspApi\Func
 */
class DomainDeleteItem extends AbstractFunc
{
    /**
     * @var string
     */
    protected $func = 'domain.sublist.delete';

    /**
     * @var bool
     */
    protected $isSaveAction = true;

    public function __construct(string $elid = '', string $plid = '')
    {
        $elid = \str_replace(' ', '+', $elid);
        parent::__construct($elid, $plid);
    }
}