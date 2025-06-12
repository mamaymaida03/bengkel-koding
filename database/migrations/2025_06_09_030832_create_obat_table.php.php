<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('obat', function (Blueprint $table) {
        $table->id(); // secara otomatis menghasilkan BIGINT UNSIGNED
        $table->string('nama_obat', 50);
        $table->string('kemasan', 35);
        $table->integer('harga');
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
