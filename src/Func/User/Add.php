<?php

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

/**
 * Class UserAdd
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
     * @param string $name
     *
     * @return Add
     */
    public function setName(string $name): self
    {
        $this->additional['name'] = $name;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return Add
     */
    public function setPassword(string $password): self
    {
        $this->additional['passwd'] = $password;
        $this->additional['confirm'] = $password;
        return $this;
    }

    /**
     * @param string $preset
     *
     * @return Add
     */
    public function setPreset(string $preset): self
    {
        $this->additional['preset'] = $preset;
        return $this;
    }

    /**
     * @param string $addInfo
     *
     * @return Add
     */
    public function setAddInfo(string $addInfo): self
    {
        $this->additional['addinfo'] = $addInfo;
        return $this;
    }

    /**
     * @param string $fullName
     *
     * @return Add
     */
    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;
        return $this;
    }

    /**
     * @param string $owner
     *
     * @return Add
     */
    public function setOwner(string $owner): self
    {
        $this->additional['owner'] = $owner;
        return $this;
    }

    /**
     * @param string $comment
     *
     * @return Add
     */
    public function setComment(string $comment): self
    {
        $this->additional['comment'] = $comment;
        return $this;
    }

    /**
     * @param string $status
     *
     * @return Add
     */
    public function setStatus(string $status): self
    {
        $this->additional['status'] = $status;
        return $this;
    }

    /**
     * @param string $quota
     *
     * @return Add
     */
    public function setQuota(string $quota): self
    {
        $this->additional['quota'] = $quota;
        return $this;
    }

    /**
     * @param string $loc
     *
     * @return Add
     */
    public function setLocation(string $loc): self
    {
        $this->additional['loc'] = $loc;
        return $this;
    }
}
