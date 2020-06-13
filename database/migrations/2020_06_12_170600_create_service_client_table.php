<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_client', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                        ->constrained()
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreignId('service_id')
                        ->constrained()
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('service_client');
    }
}
