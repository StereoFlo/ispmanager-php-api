<?php

declare(strict_types = 1);

namespace IspApi\Format;

interface FormatInterface
{
    public function getFormat(): string;

    public function setData(string $data): self;

    public function getResult(): array;
}
