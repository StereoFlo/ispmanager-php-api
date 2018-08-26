<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 20:56
 */

namespace IspApi\Format;

abstract class AbstractFormat implements FormatInterface
{
    protected $format;

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
