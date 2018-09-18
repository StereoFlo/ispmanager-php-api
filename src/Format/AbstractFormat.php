<?php

namespace IspApi\Format;

/**
 * Class AbstractFormat
 * @package IspApi\Format
 */
abstract class AbstractFormat implements FormatInterface
{
    /**
     * @var string
     */
    protected $format;

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param $data
     *
     * @return FormatInterface
     */
    public function setData($data): FormatInterface
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOut()
    {
        return $this->data;
    }
}
