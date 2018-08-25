<?php

namespace IspApi\HttpClient;

/**
 * Interface HttpClientInterface
 * @package IspApi\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param HttpClientParams $params
     *
     * @return self
     */
    public function setParams(HttpClientParams $params);

    /**
     * @return mixed
     */
    public function get();
}
