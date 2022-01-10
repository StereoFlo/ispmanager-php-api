<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 24.08.18
 * Time: 22:54.
 */

namespace App\Tests;

use Exception;
use IspApi\Credentials\Credentials;
use IspApi\Format\HtmlFormat;
use IspApi\Format\JsonFormat;
use IspApi\HttpClient\CurlClient;
use IspApi\ispManager;
use IspApi\Server\Server;
use PHPUnit\Framework\TestCase;
use function join;
use function var_dump;

class TestISPManager extends TestCase
{
    private $ispServer   = 'isp.server.ru';
    private $ispUser     = 'root';
    private $ispPassword = '*****';

    private $userName     = 'test1123123';
    private $userPassword = 'ASF@asdga1';

    private $server;
    private $credentials;
    private $client;
    /** @var ispManager */
    private $ispManager;

    public function setUp(): void
    {
        $this->server      = new Server($this->ispServer, 1500);
        $this->credentials = new Credentials($this->ispUser, $this->ispPassword);
//        $this->client = new StreamClient();
        $this->client     = new CurlClient();
        $this->ispManager = (new ispManager())
            ->setServer($this->server)
            ->setCredentials($this->credentials)
            ->setHttpClient($this->client)
            ->setFormat(new JsonFormat());
    }

    public function test_create_user(): void
    {
        $userCreate = (new \IspApi\Func\User\Add())
            ->setName($this->userName)
            ->setPassword($this->userPassword)
            ->setAddInfo('off');

        try {
            $result = $this->ispManager->setFunc($userCreate)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_add_web_domain(): void
    {
        $addWebDomain = (new \IspApi\Func\WebDomain\Add())
            ->setDomainName('test.domain.ru')
            ->setOwner($this->userName)
            ->setEmail('test@mail.ru');

        try {
            $result = $this->ispManager->setFunc($addWebDomain)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_edit_web_domain(): void
    {
        $editWebDomain = (new \IspApi\Func\WebDomain\Edit('test.domain.ru'))
            ->setAliases('tttt.test.domain.ru')
            ->setEmail('t1111est@mail.ru');

        try {
            $result = $this->ispManager->setFunc($editWebDomain)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_delete_web_domain(): void
    {
        $deleteWebDomain = new \IspApi\Func\WebDomain\Delete('test.domain.ru');

        try {
            $result = $this->ispManager->setFunc($deleteWebDomain)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_add_ftp(): void
    {
        $addFtp = (new \IspApi\Func\Ftp\Add())
            ->setName($this->userName)
            ->setOwner($this->userName)
            ->setPassword($this->userPassword)
            ->setHome('/');

        try {
            $result = $this->ispManager->setFunc($addFtp)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_edit_ftp(): void
    {
        $editFtp = (new \IspApi\Func\Ftp\Edit($this->userName))
            ->setPassword('111111222Avx');

        try {
            $result = $this->ispManager->setFunc($editFtp)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_suspend_ftp(): void
    {
        $suspendFtp = new \IspApi\Func\Ftp\Suspend($this->userName);

        try {
            $result = $this->ispManager->setFunc($suspendFtp)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_resume_ftp(): void
    {
        $resumeFtp = new \IspApi\Func\Ftp\Resume($this->userName);

        try {
            $result = $this->ispManager->setFunc($resumeFtp)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_del_ftp(): void
    {
        $delFtp = new \IspApi\Func\Ftp\Delete($this->userName);

        try {
            $result = $this->ispManager->setFunc($delFtp)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_create_db(): void
    {
        $createDb = (new \IspApi\Func\Db\Create())
            ->setUserName($this->userName)
            ->setPassword($this->ispPassword)
            ->setOwner($this->userName)
            ->setName('testdb')
            ->setServer('mysql-5.7')
            ->setRemoteAccess(true);

        try {
            $result = $this->ispManager->setFunc($createDb)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_edit_db(): void
    {
        $editDb = (new \IspApi\Func\Db\Edit($this->userName, 'testdb->mysql-5.7'))
            ->setPassword('asd2p!da')
            ->setRemoteAccess(false);

        try {
            $result = $this->ispManager->setFunc($editDb)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $message = '';
        if (isset($result['doc']['error'])) {
            $message = join($result['doc']['error']['msg']);
        }

        $this->assertEquals(isset($result['doc']['error']), false, $message);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_dump_db(): void
    {
        $this->ispManager->setFormat(new HtmlFormat());
        $dumpDb = new \IspApi\Func\Db\Dump('testdb->mysql-5.7');

        try {
            $result = $this->ispManager->setFunc($dumpDb)->execute();
            $this->ispManager->setFormat(new JsonFormat());
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $this->assertRegExp('/MySQL/', $result);
    }

    public function test_delete_db(): void
    {
        $deleteDb = new \IspApi\Func\Db\Delete('testdb->mysql-5.7');

        try {
            $result = $this->ispManager->setFunc($deleteDb)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $this->assertEquals(isset($result['doc']['error']), false);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }

    public function test_delete_user(): void
    {
        $userDelete = new \IspApi\Func\User\Delete($this->userName);

        try {
            $result = $this->ispManager->setFunc($userDelete)->execute();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        $this->assertEquals(isset($result['doc']['error']), false);
        $this->assertEquals(isset($result['doc']['ok']), true);
    }
}
