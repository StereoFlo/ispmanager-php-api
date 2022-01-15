<?php

declare(strict_types = 1);

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected string $func = 'db.users.edit';

    public function __construct(string $userName, string $nameAndServer)
    {
        parent::__construct($userName, $nameAndServer);
        $this->additional['sok'] = 'ok';
    }

    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;

        return $this;
    }

    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = true === $value ? 'on' : 'off';

        return $this;
    }

    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;

        return $this;
    }
}
