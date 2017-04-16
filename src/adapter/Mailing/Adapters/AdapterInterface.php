<?php

namespace Mailing\Adapters;

interface AdapterInterface
{
    /**
     * @return bool
     */
    public function send(): bool;

    /**
     * @return string
     */
    public function confirmmation(): string;

    /**
     * @return string
     */
    public function error(): string;
}
