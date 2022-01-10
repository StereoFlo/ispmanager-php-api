<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:11.
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
     * @return Create
     */
    public function setName(string $name): self
    {
        $this->additional['name'] = $name;

        return $this;
    }

    /**
     * @return Create
     */
    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;

        return $this;
    }

    /**
     * @return Create
     */
    public function setUserName(string $userName): self
    {
        $this->additional['username'] = $userName;

        return $this;
    }

    /**
     * @return Create
     */
    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;
        $this->additional['confirm']  = $password;

        return $this;
    }

    /**
     * @return Create
     */
    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = true === $value ? 'on' : 'off';

        return $this;
    }

    /**
     * @return Create
     */
    public function setServer(string $server): self
    {
        $this->additional['server'] = $server;

        return $this;
    }

    /**
     * @return Create
     */
    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;

        return $this;
    }
}
