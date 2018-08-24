<?php

namespace IspApi\Func\WebDomain;

use IspApi\Func\AbstractFunc;

/**
 * Class DomainAdd
 */
class Add extends AbstractFunc
{
    protected $func = 'webdomain.edit';

    /**
     * Edit constructor.
     */
    public function __construct()
    {
        $this->additional['sok'] = 'ok';
        parent::__construct();
    }

    /**
     * @param string $domain
     *
     * @return Add
     */
    public function setDomainName(string $domain): self
    {
        $this->additional['name'] = $domain;
        return $this;
    }

    /**
     * Владелец. Пользователь-владелец WWW-домена
     *
     * @param string $name
     *
     * @return Add
     */
    public function setOwner(string $name): self
    {
        $this->additional['owner'] = $name;
        return $this;
    }

    /**
     * E-Mail администратора. Электронная почта, которая будет отображаться на страницах ошибок для данного WWW-домена.
     * По умолчанию, после ввода доменного имени будет прописан почтовый ящик webmaster@<доменное имя>
     *
     * @param string $email
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
     * будут прописаны псевдонимы: www.example.com и *.example.com
     *
     * @param string $aliases
     *
     * @return Add
     */
    public function setAliases(string $aliases): self
    {
        $this->additional['aliases'] = $aliases;
        return $this;
    }

    /**
     * Корневая директория. Путь к директории WWW-домена. Указывается относительно домашней директории владельца
     *
     * @param string $home
     *
     * @return Add
     */
    public function setHome(string $home): self
    {
        $this->additional['home'] = $home;
        return $this;
    }
}
