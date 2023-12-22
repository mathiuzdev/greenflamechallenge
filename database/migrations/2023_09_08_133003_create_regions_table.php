<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id(); 
            $table->string('code', 50); 
            $table->string('name', 100); 
            $table->unsignedInteger('display_order')->nullable(); 
        });
        DB::table('regions')->insert([
            ['id' => 1, 'code' => 'NAM', 'name' => 'North America & Canada', 'display_order' => 1],
            ['id' => 2, 'code' => 'EMEA', 'name' => 'Europe, Middle East and Africa', 'display_order' => 2],
            ['id' => 3, 'code' => 'LAC', 'name' => 'Latin America & the Caribbean', 'display_order' => 3],
            ['id' => 4, 'code' => 'APAC', 'name' => 'Asia Pacific', 'display_order' => 4],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
