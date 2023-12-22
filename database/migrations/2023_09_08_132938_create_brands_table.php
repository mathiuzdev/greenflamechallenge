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
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 100); 
            $table->unsignedInteger('display_order')->nullable(); 
            $table->tinyInteger('active'); 
            $table->timestamps(); 
        });
        DB::table('brands')->insert([
            ['id' => 1, 'name' => 'Avis', 'display_order' => 10, 'active' => 1],
            ['id' => 2, 'name' => 'Budget', 'display_order' => 20, 'active' => 1],
            ['id' => 3, 'name' => 'Payless', 'display_order' => 30, 'active' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
