<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 20:50
 */

namespace IspApi\Format;

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
