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
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_city');
            $table->unsignedBigInteger('id_payment_type');
            $table->string('name');
            $table->text('address');
            $table->string('phone');
            $table->integer('zip');
            $table->text('note');
            $table->integer('total');
            $table->integer('status');
            $table->timestamps();

            // foreign key constraints
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_city')->references('id')->on('cities');
            $table->foreign('id_payment_type')->references('id')->on('payments_types');
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
