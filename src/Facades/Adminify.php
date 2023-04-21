<?php

namespace Nalcom\Adminify\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Nalcom\Adminify\Adminify
 */
class Adminify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nalcom\Adminify\Adminify::class;
    }
}
