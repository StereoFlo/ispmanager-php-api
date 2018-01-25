<?php

namespace IspApi;

use IspApi\Func\FuncInterface;
use IspApi\Server\ServerInterface;
use IspApi\User\UserInterface;

/**
 * Class ispManager
 * @package IspApi
 */
class ispManager
{
    /**
     * @var ServerInterface
     */
    private $server;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @var string
     */
    private $format = 'json';

    /**
     * @var FuncInterface
     */
    private $func;

    /**
     * @var string
     */
    private $url;

    private $urlParts = [];

    /**
     * @var
     */
    private $data;

    /**
     * @param ServerInterface $server
     * @return ispManager
     */
    public function setServer(ServerInterface $server): self
    {
        $this->server = $server;
        return $this;
    }

    /**
     * @param UserInterface $user
     * @return ispManager
     */
    public function setUser(UserInterface $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $format
     * @return ispManager
     */
    public function setFormat(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param FuncInterface $func
     * @return self
     */
    public function setFunc(FuncInterface $func): self
    {
        $this->func = $func;
        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return self
     */
    public function buildUrl(): self
    {
        $this->url = $this->server->getSchema() . '://' . $this->server->getHost();
        $this->prepareUrlPort();
        $this->prepareUrlUser();
        $this->prepareUrlFormat();
        $this->prepareUrlFunc();
        $this->url .= http_build_query($this->urlParts);
        return $this;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function execute(): string
    {
        $param = $this->prepareParams();

        try {
            $connection = \fopen($this->url, 'rb', false, \stream_context_create($param));
            $response = '';
            while ($data = \fread($connection, 4096)) {
                $response .= $data;
            }
            if (!empty($response)) {
                $response = \json_decode($response, true);
            }
            $response = \json_encode([
                'success' => true,
                'data' => $response,
            ]);
            \fclose($connection);
        } catch (\Exception $exception) {
            $response = \json_encode(['success' => false, 'message' => 'something went wrong']);
        }
        return $response;
    }

    /**
     * @return $this
     */
    private function prepareUrlPort(): self
    {
        if ($this->server->getPort()) {
            $this->url .= ':' . $this->server->getPort() . '/?';
            return $this;
        }
        $this->url .= '/?';
        return $this;
    }

    /**
     * @return $this
     */
    private function prepareUrlUser(): self
    {
        $this->urlParts['authinfo'] = $this->user->getLogin() . ':' . $this->user->getPassword();
        return $this;
    }

    /**
     * @return self
     */
    private function prepareUrlFormat(): self
    {
        $this->urlParts['out'] = $this->format;
        return $this;
    }

    /**
     * @return self
     */
    private function prepareUrlFunc(): self
    {
        $this->urlParts['func'] = $this->func->getFunc();
        if ($this->func->getElid()) {
            $this->urlParts['elid'] = $this->func->getElid();
        }
        if ($this->func->getPlid()) {
            $this->urlParts['plid'] = $this->func->getPlid();
        }
        return $this;
    }

    /**
     * @return array
     */
    private function prepareParams(): array
    {
        if ($this->func->isSaveAction()) {
            if (!empty($this->func->getAdditional())) {
                $this->urlParts = array_merge($this->urlParts, $this->func->getAdditional());
            }
            return [
                'http' => [
                    'method'  => 'POST',
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'content' => urldecode(http_build_query($this->urlParts)),
                ]
            ];
        }
        return [
            'http' => [
                'method' => 'GET',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            ],
        ];
    }

}