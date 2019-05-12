<?php

namespace IspApi;

use Exception;
use function http_build_query;
use IspApi\Format\FormatInterface;
use IspApi\Func\FuncInterface;
use IspApi\HttpClient\HttpClientInterface;
use IspApi\HttpClient\HttpClientParams;
use IspApi\Server\ServerInterface;
use IspApi\Credentials\CredentialsInterface;

/**
 * Class ispManager
 * @package IspApi
 */
class ispManager
{
    const DEFAULT_HEADER = ["Content-type: application/x-www-form-urlencoded\r\n"];

    /**
     * @var ServerInterface
     */
    private $server;

    /**
     * @var CredentialsInterface
     */
    private $credentials;

    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * @var FormatInterface
     */
    private $format;

    /**
     * @var FuncInterface
     */
    private $func;

    /**
     * @var string
     */
    private $url;

    /**
     * @var UrlParts
     */
    private $urlParts;

    /**
     * @var
     */
    private $data;

    /**
     * ispManager constructor.
     */
    public function __construct()
    {
        $this->urlParts = new UrlParts();
    }

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
     * @param CredentialsInterface $credentials
     *
     * @return ispManager
     */
    public function setCredentials(CredentialsInterface $credentials): self
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @param HttpClientInterface $httpClient
     *
     * @return ispManager
     */
    public function setHttpClient(HttpClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @param FormatInterface $format
     *
     * @return ispManager
     */
    public function setFormat(FormatInterface $format): self
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
     * @return mixed
     * @throws Exception
     */
    public function execute()
    {
        $data = $this->httpClient->setParams($this->getHttpClientParams())->get();
        return $this->format->setData($data)->getOut();
    }

    /**
     * @return HttpClientParams
     */
    public function getHttpClientParams(): HttpClientParams
    {
        $this->buildUrl();
        $method = $this->func->getIsSaveAction() ? HttpClientParams::HTTP_METHOD_POST : HttpClientParams::HTTP_METHOD_GET;

        $header = self::DEFAULT_HEADER;
        return new HttpClientParams($this->url, $method, $header);
    }

    /**
     * @return self
     */
    private function buildUrl(): self
    {
        $this->url = $this->server->getSchema() . '://' . $this->server->getHost();
        $this->prepareUrlPort();
        $this->prepareUrlUser();
        $this->prepareUrlFormat();
        $this->prepareUrlFunc();
        $this->prepareUrlAdditional();
        $this->url .= http_build_query($this->urlParts->toArray());
        return $this;
    }

    /**
     * @return self
     */
    private function prepareUrlAdditional(): self
    {
        if ($this->func->getAdditional()) {
            $this->urlParts = array_merge($this->urlParts->toArray(), $this->func->getAdditional());
        }
        return $this;
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
        $this->urlParts->setAuthinfo($this->credentials->getLogin() . ':' . $this->credentials->getPassword());
        return $this;
    }

    /**
     * @return self
     */
    private function prepareUrlFormat(): self
    {
        $this->urlParts->setOut($this->format->getFormat());
        return $this;
    }

    /**
     * @return self
     */
    private function prepareUrlFunc(): self
    {
        $this->urlParts->setFunc($this->func->getFunc());
        if ($this->func->getElid()) {
            $this->urlParts->setElid($this->func->getElid());
        }
        if ($this->func->getPlid()) {
            $this->urlParts->setPlid($this->func->getPlid());
        }
        return $this;
    }
}
