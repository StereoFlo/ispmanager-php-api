<?php

declare(strict_types = 1);

namespace IspApi\Format;

class HtmlFormat extends AbstractFormat
{
    protected string $format = 'html';

    public function getResult(): array
    {
        return [$this->data];
    }
}
