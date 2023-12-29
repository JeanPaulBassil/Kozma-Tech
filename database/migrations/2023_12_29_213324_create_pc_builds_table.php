<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('motherboard_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('cpu_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('ram_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('psu_id')->nullable()->constrained('power_supplies')->onDelete('set null');
            $table->foreignId('gpu_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('storage_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('cooler_id')->nullable()->constrained()->onDelete('set null'); 
            $table->foreignId('case_id')->nullable()->constrained()->onDelete('set null'); 
            $table->decimal('total_price', 8, 2);
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
        Schema::dropIfExists('pc_builds');
    }
}
