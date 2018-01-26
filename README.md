# ISPManager PHP API

Этот код - попытка накидать клиент для API панели управления сервером ISPManager на PHP. В моем случае - я использую DNS хостинг, поэтому сделал все под себя (только управление ДНС). Однако, вы без труда, разбереретесь как напрогать классы для управления определенным разделом этой панели. Если у вас есть вопросы, с удовольствием на них отвечу.

### Использование

#### Подготовка сервера и пользователя
```php
include 'vendor/autoload.php';

$server = new \IspApi\Server\Server('server', 1500);
$credentials = new \IspApi\User\User('user', 'password');

```

#### Подготовка действий

###### Подготовка к получению списка доменов
```php
$getDomainList = new \IspApi\Func\Domain\GetList();
```

###### Подготовка к удалению домена
```php
$deleteDomain = new \IspApi\Func\Domain\Delete('domain.ru');
```

###### Подготовка к добавлению домена

```php
$addDomain = new \IspApi\Func\Domain\Add();
$addDomain->setAdditional([
    'name'    => 'domain.ru',
    'ip'      => '127.0.0.1',
    'ns'      => 'dns3.domain.net. dns1.domain.net. dns2.domain.net.',
    'ns_list' => '',
    'mx'      => 'mail',
    'mx_list' => '',
    'elid'    => '',
    'sok'     => 'ok',
]);
```

###### Подготовка к получению списка записей по выбранному домену
```php
$listEntriesByDomain = new \IspApi\Func\Domain\Record\GetList('domain.ru');
```

###### Подготовка к удалению выбранной записи домена
```php
$deleteDomainEntry = new \IspApi\Func\Domain\Record\Delete('test A  127.0.0.1', 'domain.ru');
```

###### Подготовка к добавлению записи в домен 
```php
$addItemToDomain = new \IspApi\Func\Domain\Record\Add('', 'domain.ru');
$addItemToDomain->setAdditional([
    'name' => 'test1',
    'sdtype' => 'A',
    'addr' => '127.0.0.1',
    'prio' => '',
    'wght' => '',
    'port' => '',
    'elid' => '',
    'sok'  => 'ok',
]);
```

###### Подготовка к получению SOA записи
```php
$getSoaRecord = new \IspApi\Func\Domain\Soa\GetSoa('domain.ru');
```

###### Подготовка к изменению записи SOA
```php
$domainSoaEdit = new \IspApi\Func\Domain\Soa\Edit('domain.ru');
$domainSoaEdit->setAdditional([
    'primary' => 'dns3.domain.net.',
    'email'   => 'info@domain.net',
    'serial'  => '2018012514',
    'refresh' => '10800',
    'retry'   => '3600',
    'expire'  => '604800',
    'ttl'     => '3600',
    'sok'     => 'ok',
]);
```

###### Создаем все необходимое для дальнейшего использования
```php
$ispManager = new IspApi\ispManager();
$ispManager->setServer($server)
    ->setUser($credentials);
```

###### Выполняем/Получаем
Обратите внимение, что setFunc это установка заранее подготовленного действия.
```php
try {
    $result = $ispManager->setFunc($domainSoaEdit)->execute();
    //so something
} catch (\Exception $exception) {
    var_dump($exception);
    //so something
}
```