<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uf', 2);
            $table->timestamps();

            $table->foreignId('state_id')
                ->index()
                ->references('id')
                ->on('states')
                ->onDelete('restrict');
        });

//        Artisan::call('db:seed', [
//            '--class' => 'CitySeeder',
//            '--force' => true
//        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cities');
    }
};
