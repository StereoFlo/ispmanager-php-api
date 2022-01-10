<?php

declare(strict_types = 1);

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

class Add extends AbstractFunc
{
    protected string $func = 'webdomain.edit';

    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    public function setDomainName(string $domain): self
    {
        $this->additional['name'] = $domain;

        return $this;
    }

    /**
     * Владелец. Пользователь-владелец WWW-домена.
     */
    public function setOwner(string $name): self
    {
        $this->additional['owner'] = $name;

        return $this;
    }

    /**
     * E-Mail администратора. Электронная почта, которая будет отображаться на страницах ошибок для данного WWW-домена.
     * По умолчанию, после ввода доменного имени будет прописан почтовый ящик webmaster@<доменное имя>.
     *
     * @return Add
     */
    public function setEmail(string $email): self
    {
        $this->additional['email'] = $email;

        return $this;
    }

    /**
     * Псевдонимы. Дополнительные имена вашего WWW-домена, например www.example.com или wiki.example.com
     * и другие адреса связанные с указываемым выше доменным именем. По умолчанию, после ввода доменного имени,
     * будут прописаны псевдонимы: www.example.com и *.example.com.
     */
    public function setAliases(string $aliases): self
    {
        $this->additional['aliases'] = $aliases;

        return $this;
    }

    /**
     * Корневая директория. Путь к директории WWW-домена. Указывается относительно домашней директории владельца.
     */
    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;

        return $this;
    }
}
