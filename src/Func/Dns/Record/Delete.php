<?php

declare(strict_types = 1);

namespace IspApi\Func\Dns\Record;

use IspApi\Func\AbstractFunc;
use function str_replace;

class Delete extends AbstractFunc
{
    protected string $func       = 'domain.sublist.delete';
    protected bool $isSaveAction = true;

    public function __construct(string $elid = '', string $plid = '')
    {
        $elid = str_replace(' ', '+', $elid);
        parent::__construct($elid, $plid);
    }
}
