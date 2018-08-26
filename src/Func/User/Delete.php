<?php

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

/**
 * Class UserDelete
 */
class Delete extends AbstractFunc
{
    protected $func = 'user.delete';

    /**
     * Edit constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
