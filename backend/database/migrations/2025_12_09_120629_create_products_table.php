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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');            // toote nimi
        $table->text('description')->nullable(); // kirjeldus
        $table->decimal('price', 8, 2)->default(0); // hind
        $table->string('image_path')->nullable();   // pildi failinimi
        $table->string('sizes')->nullable();   // suurused komadega, nt "S,M,L"
        $table->string('colors')->nullable();  // värvid komadega, nt "punane,must"
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
