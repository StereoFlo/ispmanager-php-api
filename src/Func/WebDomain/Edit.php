<?php

declare(strict_types = 1);

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainEdit.
 */
class Edit extends AbstractFunc
{
    protected $func = 'webdomain.edit';

    /**
     * Edit constructor.
     */
    public function __construct(string $domain)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($domain);
    }

    /**
     * @return Edit
     */
    public function setEmail(string $email): self
    {
        $this->additional['email'] = $email;

        return $this;
    }

    /**
     * @return Edit
     */
    public function setAliases(string $aliases): self
    {
        $this->additional['aliases'] = $aliases;

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
