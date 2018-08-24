<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:01
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Suspend extends AbstractFunc
{
    protected $func = 'ftp.user.suspend';

    /**
     * Edit constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($name);
    }
}
