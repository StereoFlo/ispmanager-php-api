<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:19
 */

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected $func = 'db.users.edit';

    /**
     * Edit constructor.
     *
     * @param string $userName
     * @param string $nameAndServer
     */
    public function __construct(string $userName, string $nameAndServer)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($userName, $nameAndServer);
    }

    /**
     * @param string $password
     *
     * @return Edit
     */
    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;
        return $this;
    }

    /**
     * @param bool $value
     *
     * @return Edit
     */
    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = $value === true ? 'on' : 'off';
        return $this;
    }

    /**
     * @param string $list
     *
     * @return Edit
     */
    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;
        return $this;
    }
}
