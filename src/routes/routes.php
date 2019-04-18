<?php

Route::group(['prefix' => 'api', 'middleware' => 'api'], function()
{
    Route::get("/assets", "TechlifyInc\TechlifyAssetManagement\Controllers\AssetController@index")
        ->middleware("LaravelRbacEnforcePermission:asset_read");
    Route::post("/assets", "TechlifyInc\TechlifyAssetManagement\Controllers\AssetController@store")
        ->middleware("LaravelRbacEnforcePermission:asset_create");
    Route::put("/assets/{id}", "TechlifyInc\TechlifyAssetManagement\Controllers\AssetController@update")
        ->middleware("LaravelRbacEnforcePermission:asset_update");
    Route::delete("/assets/{id}", "TechlifyInc\TechlifyAssetManagement\Controllers\AssetController@destroy")
        ->middleware("LaravelRbacEnforcePermission:asset_delete");
    
});