<?php

declare(strict_types = 1);

namespace IspApi\HttpClient;

use const CURLOPT_HTTPHEADER;
use const CURLOPT_POST;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYHOST;
use const CURLOPT_SSL_VERIFYPEER;
use const CURLOPT_URL;
use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt;
use function http_build_query;
use function urldecode;

class CurlClient implements HttpClientInterface
{
    private HttpClientParams $params;

    public function setParams(HttpClientParams $params): self
    {
        $this->params = $params;

        return $this;
    }

    public function get(): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->params->getUrl());
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (HttpClientParams::HTTP_METHOD_POST === $this->params->getMethod()) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, urldecode(http_build_query($this->params->getContent())));
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->params->getHeader());
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
