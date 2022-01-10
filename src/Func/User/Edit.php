<?php

declare(strict_types = 1);

namespace IspApi\Func\User;

use IspApi\Func\AbstractFunc;

/**
 * Class UserEdit.
 */
class Edit extends AbstractFunc
{
    protected $func = 'user.edit';

    /**
     * Edit constructor.
     */
    public function __construct(string $name)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($name);
    }

    /**
     * @return Edit
     */
    public function setFullName(string $fullName): self
    {
        $this->additional['fullname'] = $fullName;

        return $this;
    }

    /**
     * @return Edit
     */
    public function setPassword(string $password): self
    {
        $this->additional['passwd']  = $password;
        $this->additional['confirm'] = $password;

        return $this;
    }
}
