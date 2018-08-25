<?php

namespace IspApi\HttpClient;

/**
 * Class CurlClient
 * @package IspApi\HttpClient
 */
class CurlClient implements HttpClientInterface
{
    /**
     * @var HttpClientParams
     */
    private $params;

    /**
     * @param HttpClientParams $params
     *
     * @return self
     */
    public function setParams(HttpClientParams $params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $ch = \curl_init();
        \curl_setopt($ch, CURLOPT_URL, $this->params->getUrl());
        \curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        \curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->params->getMethod() === HttpClientParams::HTTP_METHOD_POST) {
            \curl_setopt($ch, CURLOPT_POST, true);
            \curl_setopt($ch, CURLOPT_POSTFIELDS, \urldecode(\http_build_query($this->params->getContent())));
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->params->getHeader());
        $response = \curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
