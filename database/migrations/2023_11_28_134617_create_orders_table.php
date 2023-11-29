<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->string('waste_type');
            $table->integer('waste_qty');
            $table->string('user_notes');
            $table->bigInteger('recycle_fee');
            $table->bigInteger('pickup_fee');
            $table->bigInteger('subtotal_fee');
            $table->string('order_status');
            $table->dateTime('order_datetime');
            $table->dateTime('pickup_datetime');
            $table->double('pickup_longitude');
            $table->double('pickup_latitude');
        });

        Schema::table('orders',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
