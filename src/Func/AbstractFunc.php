<?php

declare(strict_types = 1);

namespace IspApi\Func;

use function array_merge;

abstract class AbstractFunc implements FuncInterface
{
    protected bool $isSaveAction = false;
    protected string $func;
    protected string $elid;
    protected string $plid;

    /**
     * @var array<mixed>
     */
    protected array $additional = [];

    public function __construct(string $elid = null, string $plid = null)
    {
        if ($elid) {
            $this->elid = $elid;
        }
        if ($plid) {
            $this->plid = $plid;
        }
    }

    /**
     * @param array<mixed> $additional
     *
     * @return $this
     */
    public function setAdditional(array $additional): self
    {
        if (empty($this->additional)) {
            $this->additional = $additional;

            return $this;
        }
        $this->additional = array_merge($this->additional, $additional);

        return $this;
    }

    final public function getFunc(): ?string
    {
        return $this->func;
    }

    final public function getElid(): ?string
    {
        return $this->elid;
    }

    final public function getPlid(): ?string
    {
        return $this->plid;
    }

    final public function getIsSaveAction(): bool
    {
        return $this->isSaveAction;
    }

    /**
     * @return mixed[]
     */
    final public function getAdditional(): array
    {
        return $this->additional;
    }
}
