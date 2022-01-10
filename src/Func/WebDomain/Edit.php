<?php

declare(strict_types = 1);

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

class Edit extends AbstractFunc
{
    protected string $func = 'webdomain.edit';

    public function __construct(string $domain)
    {
        $this->additional['sok'] = 'ok';
        parent::__construct($domain);
    }

    public function setEmail(string $email): self
    {
        $this->additional['email'] = $email;

        return $this;
    }

    public function setAliases(string $aliases): self
    {
        $this->additional['aliases'] = $aliases;

        return $this;
    }

    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;

        return $this;
    }
}
