<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 3:58.
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected $func = 'ftp.user.edit';

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
    public function setPassword(string $passwd): self
    {
        $this->additional['passwd']  = $passwd;
        $this->additional['confirm'] = $passwd;

        return $this;
    }

    /**
     * @return Edit
     */
    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;

        return $this;
    }
}
