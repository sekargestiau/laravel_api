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
        Schema::create('collectors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->double('drop_latitude');
            $table->double('drop_longitude');
            $table->double('current_latitude');
            $table->double('current_longitude');
        });

        Schema::table('collectors',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collectors');
    }
};
