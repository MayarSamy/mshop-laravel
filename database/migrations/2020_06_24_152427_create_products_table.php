<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedDouble('price');
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedInteger('reorder_point')->default(0);
            $table->string('image')->nullable();

            {
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')
                    ->on('categories')
                    ->references('id')
                    ->cascadeOnDelete();
            }

            {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')
                    ->on('users')
                    ->references('id')
                    ->cascadeOnDelete();
            }

            $table->softDeletes();            
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
        Schema::dropIfExists('products');
    }
}
