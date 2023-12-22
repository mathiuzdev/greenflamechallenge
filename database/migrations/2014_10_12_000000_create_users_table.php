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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => null,
            'password' => '$2y$10$rjYpVUsRvyLuTBiifZl9gej/FvJ7LEn2sDatXwdVkykxgg463J3ye',
            'remember_token' => 'Gvbwvq1bd594l0V68PSZ4suaWYgcycuQVv4JxG0aV8K6WtPep2eLwsdK6oI8',
            'created_at' => '2023-09-08 16:10:05',
            'updated_at' => '2023-09-08 16:10:05',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
