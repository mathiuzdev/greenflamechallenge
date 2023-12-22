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
        Schema::create('discount_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('from_days');
            $table->unsignedInteger('to_days');
            $table->double('discount')->nullable();
            $table->string('code', 15)->nullable()->collation('utf8mb4_unicode_ci');
            $table->bigInteger('discount_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('discount_ranges', function (Blueprint $table) {
            $table->foreign('discount_id')->references('id')->on('discounts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
        DB::table('discount_ranges')->insert([
            [
                'id' => 3,
                'from_days' => 1,
                'to_days' => 20,
                'discount' => null,
                'code' => 'N229900',
                'discount_id' => 5,
                'created_at' => '2023-09-09 01:23:11',
                'updated_at' => '2023-09-09 01:23:11',
            ],
            [
                'id' => 4,
                'from_days' => 1,
                'to_days' => 15,
                'discount' => null,
                'code' => 'N299900',
                'discount_id' => 6,
                'created_at' => '2023-09-09 01:24:53',
                'updated_at' => '2023-09-09 01:24:53',
            ],
            [
                'id' => 5,
                'from_days' => 10,
                'to_days' => 25,
                'discount' => 10,
                'code' => 'X99915',
                'discount_id' => 7,
                'created_at' => '2023-09-09 01:27:40',
                'updated_at' => '2023-09-09 01:27:40',
            ],
            [
                'id' => 6,
                'from_days' => 1,
                'to_days' => 25,
                'discount' => 0,
                'code' => 'LLL985',
                'discount_id' => 7,
                'created_at' => '2023-09-09 01:28:37',
                'updated_at' => '2023-09-09 01:29:02',
            ],
            [
                'id' => 8,
                'from_days' => 10,
                'to_days' => 25,
                'discount' => 0,
                'code' => 'jojoop5',
                'discount_id' => 7,
                'created_at' => '2023-09-09 02:03:32',
                'updated_at' => '2023-09-09 02:03:32',
            ],
            [
                'id' => 9,
                'from_days' => 1,
                'to_days' => 16,
                'discount' => null,
                'code' => 'DSX789',
                'discount_id' => 8,
                'created_at' => '2023-09-09 04:56:48',
                'updated_at' => '2023-09-09 04:56:48',
            ],
            [
                'id' => 10,
                'from_days' => 1,
                'to_days' => 23,
                'discount' => 34,
                'code' => 'AFX999',
                'discount_id' => 9,
                'created_at' => '2023-09-09 04:57:52',
                'updated_at' => '2023-09-09 04:57:52',
            ],
            [
                'id' => 11,
                'from_days' => 1,
                'to_days' => 15,
                'discount' => 50,
                'code' => 'JJY99',
                'discount_id' => 11,
                'created_at' => '2023-09-09 05:00:31',
                'updated_at' => '2023-09-09 05:00:31',
            ],
            [
                'id' => 12,
                'from_days' => 1,
                'to_days' => 30,
                'discount' => 23,
                'code' => 'AAWD222',
                'discount_id' => 13,
                'created_at' => '2023-09-09 16:11:48',
                'updated_at' => '2023-09-09 16:11:48',
            ],
            [
                'id' => 13,
                'from_days' => 1,
                'to_days' => 15,
                'discount' => 10,
                'code' => null,
                'discount_id' => 15,
                'created_at' => '2023-09-09 16:14:32',
                'updated_at' => '2023-09-09 16:14:32',
            ],
            [
                'id' => 14,
                'from_days' => 1,
                'to_days' => 20,
                'discount' => 60,
                'code' => 'AWS123',
                'discount_id' => 16,
                'created_at' => '2023-09-09 17:27:42',
                'updated_at' => '2023-09-09 17:27:42',
            ],
            [
                'id' => 15,
                'from_days' => 20,
                'to_days' => 40,
                'discount' => 10,
                'code' => null,
                'discount_id' => 16,
                'created_at' => '2023-09-09 17:28:00',
                'updated_at' => '2023-09-09 17:28:00',
            ],
            [
                'id' => 16,
                'from_days' => 1,
                'to_days' => 30,
                'discount' => 78,
                'code' => 'NAV780',
                'discount_id' => 19,
                'created_at' => '2023-09-09 17:36:59',
                'updated_at' => '2023-09-09 17:36:59',
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_ranges');
    }
};
