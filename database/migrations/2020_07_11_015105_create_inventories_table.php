<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            {
                $table->unsignedBigInteger('product_id');
                $table->foreign('product_id')
                    ->on('products')
                    ->references('id')
                    ->cascadeOnDelete();
            }

            {
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->on('users')
                    ->references('id')
                    ->cascadeOnDelete();
            } 


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
