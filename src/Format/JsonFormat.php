<?php

namespace IspApi\Format;

/**
 * Class JsonFormat
 * @package IspApi\Format
 */
class JsonFormat extends AbstractFormat
{
    /**
     * @var string
     */
    protected $format = 'json';

    /**
     * @return array
     */
    public function getOut(): array
    {
        return json_decode($this->data, true);
    }
}
