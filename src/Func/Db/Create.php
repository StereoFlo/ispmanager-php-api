<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:11
 */

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Create extends AbstractFunc
{
    protected $func = 'db.edit';

    /**
     * Edit constructor.
     */
    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    /**
     * @param string $name
     *
     * @return Create
     */
    public function setName(string $name): self
    {
        $this->additional['name'] = $name;
        return $this;
    }

    /**
     * @param string $owner
     *
     * @return Create
     */
    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;
        return $this;
    }

    /**
     * @param string $userName
     *
     * @return Create
     */
    public function setUserName(string $userName): self
    {
        $this->additional['username'] = $userName;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return Create
     */
    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;
        $this->additional['confirm'] = $password;
        return $this;
    }

    /**
     * @param bool $value
     *
     * @return Create
     */
    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = $value === true ? 'on' : 'off';
        return $this;
    }

    /**
     * @param string $server
     *
     * @return Create
     */
    public function setServer(string $server): self
    {
        $this->additional['server'] = $server;
        return $this;
    }

    /**
     * @param string $list
     *
     * @return Create
     */
    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;
        return $this;
    }
}
