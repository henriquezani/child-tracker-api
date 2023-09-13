<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('document_number', 11);
            $table->string('phone')->nullable();
            $table->string('profile_picture', 400)->nullable();
            $table->date('birthdate')->nullable();
            $table->enum('type', ['dash', 'app']);

            $table->foreignId('company_id')
                ->nullable()
                ->references('id')
                ->on('companies')
                ->onDelete('restrict');

            $table->foreignId('address_id')
                ->nullable()
                ->references('id')
                ->on('addresses')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('people');
    }
};
