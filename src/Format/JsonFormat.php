<?php

declare(strict_types = 1);

namespace IspApi\Format;

use function json_decode;

class JsonFormat extends AbstractFormat
{
    protected string $format = 'json';

    public function getResult(): array
    {
        return json_decode($this->data, true);
    }
}
