<?php

declare(strict_types = 1);

namespace IspApi\Format;

abstract class AbstractFormat implements FormatInterface
{
    protected string $format;
    protected $data;

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setData(string $data): FormatInterface
    {
        $this->data = $data;

        return $this;
    }

    public function getResult(): array
    {
        return $this->data;
    }
}
