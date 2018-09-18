<?php


namespace IspApi;

/**
 * Class UrlParts
 * @package IspApi
 */
class UrlParts
{
    /**
     * @var string
     */
    private $authinfo;

    /**
     * @var string
     */
    private $out;

    /**
     * @var string
     */
    private $func;

    /**
     * @var string|null
     */
    private $elid;

    /**
     * @var string|null
     */
    private $plid;

    /**
     * @return string
     */
    public function getAuthinfo(): string
    {
        return $this->authinfo;
    }

    /**
     * @param string $authinfo
     *
     * @return UrlParts
     */
    public function setAuthinfo(string $authinfo): UrlParts
    {
        $this->authinfo = $authinfo;
        return $this;
    }

    /**
     * @return string
     */
    public function getOut(): string
    {
        return $this->out;
    }

    /**
     * @param string $out
     *
     * @return UrlParts
     */
    public function setOut(string $out): UrlParts
    {
        $this->out = $out;
        return $this;
    }

    /**
     * @return string
     */
    public function getFunc(): string
    {
        return $this->func;
    }

    /**
     * @param string $func
     *
     * @return UrlParts
     */
    public function setFunc(string $func): UrlParts
    {
        $this->func = $func;
        return $this;
    }

    /**
     * @return string
     */
    public function getElid(): string
    {
        return $this->elid;
    }

    /**
     * @param string $elid
     *
     * @return UrlParts
     */
    public function setElid(string $elid): UrlParts
    {
        $this->elid = $elid;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlid(): string
    {
        return $this->plid;
    }

    /**
     * @param string $plid
     *
     * @return UrlParts
     */
    public function setPlid(string $plid): UrlParts
    {
        $this->plid = $plid;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $data = [
            'authinfo' => $this->authinfo,
            'out'      => $this->out,
            'func'     => $this->func,
        ];
        if ($this->elid) {
            $data['elid'] = $this->elid;
        }
        if ($this->plid) {
            $data['plid'] = $this->plid;
        }
        return $data;
    }
}