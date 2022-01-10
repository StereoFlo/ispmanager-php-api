<?php

declare(strict_types = 1);

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Create extends AbstractFunc
{
    protected string $func = 'db.edit';

    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    public function setName(string $name): self
    {
        $this->additional['name'] = $name;

        return $this;
    }

    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;

        return $this;
    }

    public function setUserName(string $userName): self
    {
        $this->additional['username'] = $userName;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;
        $this->additional['confirm']  = $password;

        return $this;
    }

    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = true === $value ? 'on' : 'off';

        return $this;
    }

    public function setServer(string $server): self
    {
        $this->additional['server'] = $server;

        return $this;
    }

    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;

        return $this;
    }
}
