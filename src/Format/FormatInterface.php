<?php

declare(strict_types = 1);

namespace IspApi\Format;

interface FormatInterface
{
    public function getFormat(): string;

    /**
     * @param $data
     */
    public function setData($data): self;

    public function getResult(): string;
}
