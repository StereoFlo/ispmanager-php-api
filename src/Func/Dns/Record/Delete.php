<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns\Record;

use IspApi\Func\AbstractFunc;
use function str_replace;

/**
 * Class DomainDeleteItem.
 */
class Delete extends AbstractFunc
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
        $elid = str_replace(' ', '+', $elid);
        parent::__construct($elid, $plid);
    }
}
