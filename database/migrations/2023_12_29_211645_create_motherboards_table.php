<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboards', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('socket_cpu');
            $table->integer('memory_max');
            $table->integer('memory_slots');
            $table->string('color');
            $table->decimal('price', 8, 2);
            $table->string('compatible_cpu_gen');
            $table->string('compatible_ram_type');
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
        Schema::dropIfExists('motherboards');
    }
}
