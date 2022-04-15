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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('pengenal', ['KTP', 'Paspor']);
            $table->string('nomor_pengenal', 100);
            $table->string('nama', 100);
            $table->string('alamat', 255);
            $table->string('telepon', 30);
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('repassword', 255);
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
        Schema::dropIfExists('users');
    }
};
