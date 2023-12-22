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
        Schema::create('access_types', function (Blueprint $table) {
            $table->string('code', 1)->primary(); 
            $table->text('name'); 
            $table->unsignedBigInteger('display_order');
        });
        DB::table('access_types')->insert([
            ['code' => 'A', 'name' => 'Cliente Final', 'display_order' => 1],
            ['code' => 'B', 'name' => 'Agencia', 'display_order' => 2],
            ['code' => 'C', 'name' => 'Corporativo', 'display_order' => 3],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_types');
    }
};
