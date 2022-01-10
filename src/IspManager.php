<?php

declare(strict_types = 1);

namespace IspApi;

use Exception;
use IspApi\Credentials\CredentialsInterface;
use IspApi\Format\FormatInterface;
use IspApi\Func\FuncInterface;
use IspApi\HttpClient\HttpClientInterface;
use IspApi\HttpClient\HttpClientParams;
use IspApi\Server\ServerInterface;
use function array_merge;
use function http_build_query;

class IspManager
{
    public const DEFAULT_HEADER = ["Content-type: application/x-www-form-urlencoded\r\n"];

    private ServerInterface $server;
    private CredentialsInterface $credentials;
    private HttpClientInterface $httpClient;
    private FormatInterface $format;
    private FuncInterface $func;
    private string $url;
    private UrlParts $urlParts;

    /**
     * @var array<string, mixed>
     */
    private array $data;

    public function __construct()
    {
        $this->urlParts = new UrlParts();
    }

    public function setServer(ServerInterface $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function setCredentials(CredentialsInterface $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }

    public function setHttpClient(HttpClientInterface $httpClient): self
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function setFormat(FormatInterface $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function setFunc(FuncInterface $func): self
    {
        $this->func = $func;

        return $this;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @throws Exception
     *
     * @return array<mixed>
     */
    public function execute(): array
    {
        $data = $this->httpClient->setParams($this->getHttpClientParams())->get();

        return $this->format->setData($data)->getResult();
    }

    public function getHttpClientParams(): HttpClientParams
    {
        $this->buildUrl();
        $method = $this->func->getIsSaveAction() ? HttpClientParams::HTTP_METHOD_POST : HttpClientParams::HTTP_METHOD_GET;

        $header = self::DEFAULT_HEADER;

        return new HttpClientParams($this->url, $method, $header);
    }

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

    private function prepareUrlAdditional(): self
    {
        if ($this->func->getAdditional()) {
            foreach ($this->func->getAdditional() as $part)
            $this->urlParts = array_merge($this->urlParts->toArray(), $this->func->getAdditional());
        }

        return $this;
    }

    private function prepareUrlPort(): self
    {
        if ($this->server->getPort()) {
            $this->url .= ':' . $this->server->getPort() . '/?';

            return $this;
        }
        $this->url .= '/?';

        return $this;
    }

    private function prepareUrlUser(): self
    {
        $this->urlParts->setAuthinfo($this->credentials->getLogin() . ':' . $this->credentials->getPassword());

        return $this;
    }

    private function prepareUrlFormat(): self
    {
        $this->urlParts->setOut($this->format->getFormat());

        return $this;
    }

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
