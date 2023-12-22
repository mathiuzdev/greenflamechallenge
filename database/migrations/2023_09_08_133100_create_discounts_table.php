<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->unsignedInteger('priority')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('access_type_code', 1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('access_type_code')->references('code')->on('access_types')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('region_id')->references('id')->on('regions')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
        DB::table('discounts')->insert([
            [
                'id' => 12,
                'name' => 'dczxdsd',
                'start_date' => '2023-09-05 00:00:00',
                'end_date' => '2023-09-28 00:00:00',
                'priority' => 5,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 1,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 15:47:15',
                'updated_at' => '2023-09-09 15:47:15',
                'deleted_at' => null,
            ],
            [
                'id' => 16,
                'name' => 'Invierno',
                'start_date' => '2023-09-02 00:00:00',
                'end_date' => '2023-09-29 00:00:00',
                'priority' => 6,
                'active' => 0,
                'region_id' => 3,
                'brand_id' => 2,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 17:27:26',
                'updated_at' => '2023-09-09 17:27:26',
                'deleted_at' => null,
            ],
            [
                'id' => 11,
                'name' => 'JujuyFlex',
                'start_date' => '2023-09-02 00:00:00',
                'end_date' => '2023-09-20 00:00:00',
                'priority' => 99,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 3,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 04:59:58',
                'updated_at' => '2023-09-09 04:59:58',
                'deleted_at' => null,
            ],
            [
                'id' => 18,
                'name' => 'Verano_Mardel',
                'start_date' => '2023-09-01 00:00:00',
                'end_date' => '2023-09-29 00:00:00',
                'priority' => 66,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 1,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 17:35:49',
                'updated_at' => '2023-09-09 17:35:49',
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'name' => 'cualquiera',
                'start_date' => '2023-09-01 00:00:00',
                'end_date' => '2023-09-30 00:00:00',
                'priority' => 20,
                'active' => 1,
                'region_id' => 4,
                'brand_id' => 1,
                'access_type_code' => 'B',
                'created_at' => '2023-09-09 01:27:15',
                'updated_at' => '2023-09-09 01:28:07',
                'deleted_at' => null,
            ],
            [
                'id' => 17,
                'name' => 'PARTY_BRC',
                'start_date' => '2023-09-01 00:00:00',
                'end_date' => '2023-09-30 00:00:00',
                'priority' => 67,
                'active' => 0,
                'region_id' => 3,
                'brand_id' => 2,
                'access_type_code' => 'B',
                'created_at' => '2023-09-09 17:33:03',
                'updated_at' => '2023-09-09 17:33:03',
                'deleted_at' => null,
            ],
            [
                'id' => 13,
                'name' => 'VERANO2023',
                'start_date' => '2023-09-01 00:00:00',
                'end_date' => '2023-09-21 00:00:00',
                'priority' => 55,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 2,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 16:11:21',
                'updated_at' => '2023-09-09 16:11:21',
                'deleted_at' => null,
            ],
            [
                'id' => 15,
                'name' => 'FRENCHTOP',
                'start_date' => '2023-08-12 00:00:00',
                'end_date' => '2023-09-30 00:00:00',
                'priority' => 12,
                'active' => 1,
                'region_id' => 2,
                'brand_id' => 1,
                'access_type_code' => 'C',
                'created_at' => '2023-09-09 16:14:11',
                'updated_at' => '2023-09-09 16:14:11',
                'deleted_at' => null,
            ],
            [
                'id' => 5,
                'name' => 'Verano',
                'start_date' => '2023-08-01 00:00:00',
                'end_date' => '2023-09-30 00:00:00',
                'priority' => 15,
                'active' => 1,
                'region_id' => 1,
                'brand_id' => 1,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 01:22:39',
                'updated_at' => '2023-09-09 01:23:17',
                'deleted_at' => null,
            ],
            [
                'id' => 6,
                'name' => 'usa',
                'start_date' => '2023-08-01 00:00:00',
                'end_date' => '2023-09-30 00:00:00',
                'priority' => 10,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 1,
                'access_type_code' => 'A',
                'created_at' => '2023-09-09 01:24:17',
                'updated_at' => '2023-09-09 01:24:17',
                'deleted_at' => null,
            ],
            [
                'id' => 10,
                'name' => 'Bolivia',
                'start_date' => '2023-07-01 00:00:00',
                'end_date' => '2023-10-04 00:00:00',
                'priority' => 32,
                'active' => 1,
                'region_id' => 3,
                'brand_id' => 2,
                'access_type_code' => 'B',
                'created_at' => '2023-09-09 04:58:34',
                'updated_at' => '2023-09-09 04:58:34',
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'name' => 'Chicago',
                'start_date' => '2023-06-30 00:00:00',
                'end_date' => '2023-09-23 00:00:00',
                'priority' => 76,
                'active' => 0,
                'region_id' => 4,
                'brand_id' => 2,
                'access_type_code' => 'C',
                'created_at' => '2023-09-09 04:55:00',
                'updated_at' => '2023-09-09 04:55:00',
                'deleted_at' => null,
            ],
            [
                'id' => 14,
                'name' => 'KNOWING_ASIA',
                'start_date' => '2023-05-06 00:00:00',
                'end_date' => '2023-09-23 00:00:00',
                'priority' => 77,
                'active' => 0,
                'region_id' => 4,
                'brand_id' => 3,
                'access_type_code' => 'B',
                'created_at' => '2023-09-09 16:13:04',
                'updated_at' => '2023-09-09 16:13:04',
                'deleted_at' => null,
            ],
            [
                'id' => 19,
                'name' => 'NAVIDAD',
                'start_date' => '2023-05-05 00:00:00',
                'end_date' => '2023-09-23 00:00:00',
                'priority' => 780,
                'active' => 1,
                'region_id' => 1,
                'brand_id' => 3,
                'access_type_code' => 'C',
                'created_at' => '2023-09-09 17:36:37',
                'updated_at' => '2023-09-09 17:36:37',
                'deleted_at' => null,
            ],
            [
                'id' => 9,
                'name' => 'Chile',
                'start_date' => '2022-11-11 00:00:00',
                'end_date' => '2023-09-01 00:00:00',
                'priority' => 1,
                'active' => 0,
                'region_id' => 3,
                'brand_id' => 3,
                'access_type_code' => 'B',
                'created_at' => '2023-09-09 04:57:27',
                'updated_at' => '2023-09-09 05:03:31',
                'deleted_at' => null,
            ],
        ]);
        
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
