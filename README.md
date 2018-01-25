# ISPManager PHP API

Этот код - попытка накидать клиент для API панели управления сервером ISPManager на PHP. В данном случае - я использую DNS хостинг, поэтому сделал все под себя (только управление ДНС). Однако, вы без труда, разбереретесь как напрогать классы для управления определенным разделом этой панели. Если у вас есть вопросы, с удовольствием на них отвечу.

### Использование


```php
$server = new \IspApi\Server\Server('server.com', 1500);
$credentials = new \IspApi\User\User('user', 'password');
$getDomainList = new \IspApi\Func\Domain();
 
$ispManager = new IspApi\ispManager();
$ispManager->setServer($server)
               ->setUser($credentials)
               ->setFunc($getDomainList)
               ->buildUrl();
               
$result = $manager->execute();

```