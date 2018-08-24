<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:23
 */

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Delete extends AbstractFunc
{
    protected $func = 'db.delete';

    /**
     * Edit constructor.
     *
     * @param string $nameAndServer
     */
    public function __construct(string $nameAndServer)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($nameAndServer);
    }
}
