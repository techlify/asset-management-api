<?php

namespace TechlifyInc\TechlifyAssetManagement;

use Illuminate\Support\Facades\Facade;

/**
 * Description of TechlifyAssetManagementFacade
 *
 * @author 
 * @since
 */
class TechlifyAssetManagementFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'laravel-model-logger';
    }

}
