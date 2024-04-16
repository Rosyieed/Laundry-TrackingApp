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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('owner_name');
            $table->integer('weight');
            $table->enum('service', ['Cuci Saja', 'Setrika Saja', 'Cuci dan Setrika']);
            $table->enum('status', ['Diinput', 'Sedang Dicuci', 'Selesai Dicuci', 'Sedang Disetrika', 'Selesai Disetrika', 'Sedang Dipack', 'Selesai']);
            $table->string('id_cashier')->nullable();
            $table->string('id_ironer')->nullable();
            $table->string('id_washer')->nullable();
            $table->string('id_packer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
