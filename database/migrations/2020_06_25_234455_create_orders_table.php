<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->double('total_amount')->default(0);  

            {
                $table->unsignedBigInteger('customer_id');
                $table->foreign('customer_id')
                    ->on('customers')
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

            {
                $table->unsignedBigInteger('payment_id');
                $table->foreign('payment_id')
                    ->on('payments')
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
        Schema::dropIfExists('orders');
    }
}
