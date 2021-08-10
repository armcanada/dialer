<?php

namespace Armcanada\Dialer;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Armcanada\Dialer\Skeleton\SkeletonClass
 */
class DialerFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dialer';
    }
}
