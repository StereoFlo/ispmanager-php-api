<?php

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainEdit
 */
class Edit extends AbstractFunc
{
    protected $func = 'webdomain.edit';

    /**
     * Edit constructor.
     *
     * @param string $domain
     */
    public function __construct(string $domain)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($domain);
    }

    /**
     * @param string $email
     *
     * @return Edit
     */
    public function setEmail(string $email): self
    {
        $this->additional['email'] = $email;
        return $this;
    }

    /**
     * @param string $aliases
     *
     * @return Edit
     */
    public function setAliases(string $aliases): self
    {
        $this->additional['aliases'] = $aliases;
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
