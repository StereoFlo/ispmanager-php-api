<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 3:51.
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Add extends AbstractFunc
{
    protected string $func = 'ftp.user.edit';

    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;

        return $this;
    }

    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->additional['name'] = $name;

        return $this;
    }

    public function setPassword(string $passwd): self
    {
        $this->additional['passwd']  = $passwd;
        $this->additional['confirm'] = $passwd;

        return $this;
    }
}
