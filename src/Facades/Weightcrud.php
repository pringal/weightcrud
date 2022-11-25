<?php

namespace Pringal\Weightcrud\Facades;

use Illuminate\Support\Facades\Facade;

class Weightcrud extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'weightcrud';
    }
}
