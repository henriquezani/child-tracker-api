<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->timestamps();

            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->enum('type', ['dash', 'app']);
            $table->string('active')->default(true);
            $table->timestamp('email_verified_at')->nullable();

            $table->unique(['email', 'type'], 'users_email_type_unique');

            $table->foreignId('person_id')
                ->references('id')
                ->on('people')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
    }
};
