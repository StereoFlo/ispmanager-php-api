<?php

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

/**
 * Class UserEdit
 */
class Edit extends AbstractFunc
{
    protected $func = 'user.edit';

    /**
     * Edit constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($name);
    }

    /**
     * @param string $fullName
     *
     * @return Edit
     */
    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return Edit
     */
    public function setPassword(string $password): self
    {
        $this->additional['passwd'] = $password;
        $this->additional['confirm'] = $password;
        return $this;
    }
}
