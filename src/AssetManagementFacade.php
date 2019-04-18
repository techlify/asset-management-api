<?php

namespace Techlify\AssetManagement;

use Illuminate\Support\Facades\Facade;

/**
 * Description of AssetManagementFacade
 *
 * @author 
 * @since
 */
class AssetManagementFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'asset-management-api';
    }

}
