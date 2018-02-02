<?php

namespace IspApi\HttpClient;

/**
 * Interface HttpClientInterface
 * @package IspApi\HttpClient
 */
interface HttpClientInterface
{
    /**
     * @param array $params
     *
     * @return self
     */
    public function setParams(array $params);

    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url);

    /**
     * @return array
     */
    public function get();
}