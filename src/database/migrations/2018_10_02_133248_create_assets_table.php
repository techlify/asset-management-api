<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('cost');
            $table->date('date_purchased');
            $table->string('location');
            $table->text('details')
                ->nullable()->default(null);
            $table->unsignedInteger('creator_id');
            $table->softDeletes();
            $table->timestamps();
        });
        
        $models = [
            ['slug' => "asset_create", 'label' => "Asset: Add"],
            ['slug' => "asset_read", 'label' => "Asset: View"],
            ['slug' => "asset_update", 'label' => "Asset: Edit"],
            ['slug' => "asset_delete", 'label' => "Asset: Delete"]
        ];
        DB::table('permissions')->insert($models);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
        
        $slugs = [
            "asset_create",
            "asset_read",
            "asset_update",
            "asset_delete"            
        ];

        DB::table('permissions')
            ->whereIn("slug", $slugs)
            ->delete();
    }
}
