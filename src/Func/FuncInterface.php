<?php

namespace IspApi\Func;

/**
 * Interface FuncInterface
 * @package IspApi\Func
 */
interface FuncInterface
{
    /**
     * @return string
     */
    public function getFunc(): ?string ;
    /**
     * @return string
     */
    public function getElid(): ?string ;

    /**
     * @return string
     */
    public function getPlid(): ?string ;

    /**
     * @return bool
     */
    public function getIsSaveAction(): bool ;

    /**
     * @return array
     */
    public function getAdditional(): array;
}
