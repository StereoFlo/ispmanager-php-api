<?php

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

/**
 * Class WebDomainDelete
 */
class Delete extends AbstractFunc
{
    protected $func = 'webdomain.delete';

    /**
     * Delete constructor.
     *
     * @param string $domain
     */
    public function __construct(string $domain)
    {
        parent::__construct($domain);
    }
}
