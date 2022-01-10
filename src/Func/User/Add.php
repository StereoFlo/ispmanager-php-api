<?php

declare(strict_types = 1);

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

/**
 * Class UserAdd.
 */
class Add extends AbstractFunc
{
    protected $func = 'user.add';

    /**
     * Add constructor.
     */
    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    /**
     * @return Add
     */
    public function setName(string $name): self
    {
        $this->additional['name'] = $name;

        return $this;
    }

    /**
     * @return Add
     */
    public function setPassword(string $password): self
    {
        $this->additional['passwd']  = $password;
        $this->additional['confirm'] = $password;

        return $this;
    }

    /**
     * @return Add
     */
    public function setPreset(string $preset): self
    {
        $this->additional['preset'] = $preset;

        return $this;
    }

    /**
     * @return Add
     */
    public function setAddInfo(string $addInfo): self
    {
        $this->additional['addinfo'] = $addInfo;

        return $this;
    }

    /**
     * @return Add
     */
    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;

        return $this;
    }

    /**
     * @return Add
     */
    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;

        return $this;
    }

    /**
     * @return Add
     */
    public function setComment(string $comment): self
    {
        $this->additional['comment'] = $comment;

        return $this;
    }

    /**
     * @return Add
     */
    public function setStatus(string $status): self
    {
        $this->additional['status'] = $status;

        return $this;
    }

    /**
     * @return Add
     */
    public function setQuota(string $quota): self
    {
        $this->additional['quota'] = $quota;

        return $this;
    }

    /**
     * @return Add
     */
    public function setLocation(string $loc): self
    {
        $this->additional['loc'] = $loc;

        return $this;
    }
}
