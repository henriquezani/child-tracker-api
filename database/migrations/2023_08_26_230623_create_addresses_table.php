<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('zipcode');
            $table->string('uf', 2);
            $table->string('street');
            $table->string('number', 100);
            $table->string('complement')->nullable();
            $table->string('neighborhood', 150);

            $table->foreignId('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('restrict');

            $table->foreignId('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('addresses');
    }
};
