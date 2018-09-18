<?php

namespace IspApi\Format;

/**
 * Interface FormatInterface
 * @package IspApi\Format
 */
interface FormatInterface
{
    /**
     * @return string
     */
    public function getFormat(): string;

    /**
     * @param $data
     *
     * @return self
     */
    public function setData($data): self;


    /**
     * @return mixed
     */
    public function getOut();
}
