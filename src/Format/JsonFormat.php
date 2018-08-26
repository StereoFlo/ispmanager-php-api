<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 25.08.18
 * Time: 20:46
 */

namespace IspApi\Format;

class JsonFormat extends AbstractFormat
{
    protected $format = 'json';

    /**
     * @return array
     */
    public function getOut(): array
    {
        return json_decode($this->data, true);
    }
}
