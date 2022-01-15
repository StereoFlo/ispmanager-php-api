<?php

declare(strict_types = 1);

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

class Add extends AbstractFunc
{
    protected string $func = 'user.add';

    public function __construct()
    {
        parent::__construct();
        $this->additional['sok'] = 'ok';
    }

    public function setName(string $name): self
    {
        $this->additional['name'] = $name;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->additional['passwd']  = $password;
        $this->additional['confirm'] = $password;

        return $this;
    }

    public function setPreset(string $preset): self
    {
        $this->additional['preset'] = $preset;

        return $this;
    }

    public function setAddInfo(string $addInfo): self
    {
        $this->additional['addinfo'] = $addInfo;

        return $this;
    }

    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;

        return $this;
    }

    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;

        return $this;
    }

    public function setComment(string $comment): self
    {
        $this->additional['comment'] = $comment;

        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->additional['status'] = $status;

        return $this;
    }

    public function setQuota(string $quota): self
    {
        $this->additional['quota'] = $quota;

        return $this;
    }

    public function setLocation(string $loc): self
    {
        $this->additional['loc'] = $loc;

        return $this;
    }
}
