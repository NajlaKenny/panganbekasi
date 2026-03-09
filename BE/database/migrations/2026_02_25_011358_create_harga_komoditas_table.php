<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
    public function up(): void
    {
        Schema::create('harga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('komoditas_id');
            $table->string('pasar');
            $table->integer('harga');
            $table->float('perubahan')->nullable();
            $table->timestamps();
        });
    }
=======
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('harga_komoditas', function (Blueprint $table) {
        $table->id();

        $table->foreignId('komoditas_id')
              ->constrained('komoditas')
              ->cascadeOnDelete();

        $table->foreignId('pasar_id')
              ->constrained('pasars')
              ->cascadeOnDelete();

        $table->integer('harga');
        $table->date('tanggal');

        $table->timestamps();
    });
}
>>>>>>> 8093ad7a7730c68ece7e7f445ecd30eb6fe0479e

    public function down(): void
    {
        Schema::dropIfExists('harga');
    }
};