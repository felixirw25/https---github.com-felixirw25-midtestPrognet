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
        Schema::create('keluhans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_keluhan', 255)->nullable();
            $table->string('keluhan_user', 255)->nullable();
            $table->string('balasan_admin', 255)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->dateTime('waktu_keluhan')->nullable();
            $table->dateTime('waktu_balasan')->nullable();
            $table->enum('status', ['Menunggu', 'Ditanggapi'])->default('Menunggu');
            $table->tinyInteger('is_delete')->default('0');
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
        Schema::dropIfExists('keluhans');
    }
};
