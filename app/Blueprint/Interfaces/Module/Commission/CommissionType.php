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


namespace App\Blueprint\Interfaces\Module\Commission;


/**
 * Interface CommissionType
 * @package App\Blueprint\Interfaces\Module\Commission
 */
interface CommissionType
{
    /**
     * @return mixed
     */
    function process();
}
