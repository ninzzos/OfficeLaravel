<?php
/**
 *  -------------------------------------------------
 *  Hybrid MLM  Copyright (c) 2018 All Rights Reserved
 *  -------------------------------------------------
 *
 * @author Acemero Technologies Pvt Ltd
 * @link https://www.acemero.com
 * @see https://www.hybridmlm.io
 * @version 1.00
 * @api Laravel 5.4
 */

namespace App\Blueprint\Facades;

use App\Blueprint\Services\ModuleServices;
use Illuminate\Support\Facades\Facade as ParentFacade;

/**
 * Class ModuleServer
 * @package App\Blueprint\Facades
 */
class ModuleServer extends ParentFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */

    protected static function getFacadeAccessor()
    {
        return ModuleServices::class;
    }

}
