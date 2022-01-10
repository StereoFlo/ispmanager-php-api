<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 4:19.
 */

namespace IspApi\Func\Db;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected $func = 'db.users.edit';

    /**
     * Edit constructor.
     */
    public function __construct(string $userName, string $nameAndServer)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($userName, $nameAndServer);
    }

    /**
     * @return Edit
     */
    public function setPassword(string $password): self
    {
        $this->additional['password'] = $password;

        return $this;
    }

    /**
     * @return Edit
     */
    public function setRemoteAccess(bool $value): self
    {
        $this->additional['remote_access'] = true === $value ? 'on' : 'off';

        return $this;
    }

    /**
     * @return Edit
     */
    public function setAddressList(string $list): self
    {
        $this->additional['addr_list'] = $list;

        return $this;
    }
}
