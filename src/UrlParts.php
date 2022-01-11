<?php

declare(strict_types = 1);

namespace IspApi;

class UrlParts
{
    private string $authinfo;
    private string $out;
    private string $func;
    private ?string $elid;
    private ?string $plid;

    public function getAuthinfo(): string
    {
        return $this->authinfo;
    }

    public function setAuthinfo(string $authinfo): self
    {
        $this->authinfo = $authinfo;

        return $this;
    }

    public function getOut(): string
    {
        return $this->out;
    }

    public function setOut(string $out): self
    {
        $this->out = $out;

        return $this;
    }

    public function getFunc(): string
    {
        return $this->func;
    }

    public function setFunc(string $func): self
    {
        $this->func = $func;

        return $this;
    }

    public function getElid(): ?string
    {
        return $this->elid;
    }

    public function setElid(string $elid): self
    {
        $this->elid = $elid;

        return $this;
    }

    public function getPlid(): ?string
    {
        return $this->plid;
    }

    public function setPlid(string $plid): self
    {
        $this->plid = $plid;

        return $this;
    }

    /**
     * @return array<string, mixed>
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
