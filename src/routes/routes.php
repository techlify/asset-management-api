<?php

Route::group(['prefix' => 'api', 'middleware' => 'api'], function()
{
    Route::get("/assets", "Techlify\AssetManagement\Controllers\AssetController@index")
        ->middleware("LaravelRbacEnforcePermission:asset_read");
    Route::post("/assets", "Techlify\AssetManagement\Controllers\AssetController@store")
        ->middleware("LaravelRbacEnforcePermission:asset_create");
    Route::put("/assets/{id}", "Techlify\AssetManagement\Controllers\AssetController@update")
        ->middleware("LaravelRbacEnforcePermission:asset_update");
    Route::delete("/assets/{id}", "Techlify\AssetManagement\Controllers\AssetController@destroy")
        ->middleware("LaravelRbacEnforcePermission:asset_delete");
    
});