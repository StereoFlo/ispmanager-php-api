# ISPManager PHP API

An English documentation is not ready, please use Google Translator

Этот код - попытка накидать клиент для API панели управления сервером ISPManager на PHP. В моем случае - я использую DNS хостинг, поэтому сделал все под себя (только управление ДНС). Однако, вы без труда, разбереретесь как напрогать классы для управления определенным разделом этой панели. Если у вас есть вопросы, с удовольствием на них отвечу.

### Использование

#### Установка:

```bash
composer require stereoflo/ispmanager-php-api
```

#### Подготовка сервера и пользователя

```php
include 'vendor/autoload.php';

$server = new \IspApi\Server\Server('server', 1500);
$credentials = new \IspApi\Credentials\Credentials('user', 'password');
$format = new \IspApi\Format\JsonFormat();
$client = new \IspApi\HttpClient\CurlClient(); // тут может быть любой ваш http клиент

```

#### Подготовка действий

###### Подготовка к получению списка доменов
```php
$getDomainList = new \IspApi\Func\Dns\GetList();
```

###### Подготовка к удалению домена
```php
$deleteDomain = new \IspApi\Func\Dns\Delete('domain.ru');
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
$listEntriesByDomain = new \IspApi\Func\Dns\Record\GetList('domain.ru');
```

###### Подготовка к удалению выбранной записи домена
```php
$deleteDomainEntry = new \IspApi\Func\Dns\Record\Delete('test A  127.0.0.1', 'domain.ru');
```

###### Подготовка к добавлению записи в домен 
```php
$addItemToDomain = new \IspApi\Func\Dns\Record\Add('', 'domain.ru');
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
$getSoaRecord = new \IspApi\Func\Dns\Soa\GetSoa('domain.ru');
```

###### Подготовка к изменению записи SOA
```php
$domainSoaEdit = new \IspApi\Func\Dns\Soa\Edit('domain.ru');
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

###### Создаем экземпляр IspManager и устанавливаем ранее подготовленные объелкты для дальнейшего использования
```php
$ispManager = new IspApi\IspManager();
$response = $ispManager->setServer($server)
    ->setCredentials($credentials)
    ->setFunc($getDomainList)
    ->setHttpClient($client)
    ->setFormat($format);
```

###### Выполняем/Получаем
Обратите внимание, что setFunc это установка заранее подготовленного действия (описано выше)
```php
try {
    $result = $ispManager->setFunc($domainSoaEdit)->execute();
    //do something
} catch (\Exception $exception) {
    var_dump($exception);
    //do something
}
```
