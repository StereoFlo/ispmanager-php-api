<?php

declare(strict_types = 1);

namespace IspApi\Func;

interface FuncInterface
{
    public function getFunc(): ?string;

    public function getElid(): ?string;

    public function getPlid(): ?string;

    public function getIsSaveAction(): bool;
}
