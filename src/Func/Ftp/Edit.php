<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 3:58
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected $func =  'ftp.user.edit';

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
     * @param string $passwd
     *
     * @return Edit
     */
    public function setPassword(string $passwd): self
    {
        $this->additional['passwd'] = $passwd;
        $this->additional['confirm'] = $passwd;
        return $this;
    }

    /**
     * @param string $home
     *
     * @return Edit
     */
    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;
        return $this;
    }
}
