<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 3:51
 */

namespace IspApi\Func\Ftp;

use IspApi\Func\AbstractFunc;

class Add extends AbstractFunc
{
    protected $func = 'ftp.user.edit';

    /**
     * Edit constructor.
     */
    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    /**
     * @param string $home
     *
     * @return Add
     */
    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;
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
     * @param string $passwd
     *
     * @return Add
     */
    public function setPassword(string $passwd): self
    {
        $this->additional['passwd'] = $passwd;
        $this->additional['confirm'] = $passwd;
        return $this;
    }
}
