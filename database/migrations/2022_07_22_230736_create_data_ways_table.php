<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ways', function (Blueprint $table) {
            $table->id();
            $table->foreignId('way_id')
            ->constrained('ways')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->integer('status_code');
            $table->longText('body_response');
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
        Schema::dropIfExists('data_ways');
    }
};
