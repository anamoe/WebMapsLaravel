<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDataJalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jalans', function (Blueprint $table) {
            $table->id();
            $table->string('start_latitude');
            $table->string('start_longitude');
            $table->string('end_latitude');
            $table->string('end_longitude');
            $table->string('level_jalan');
            $table->string('kecepatan');

            $table->string('status_verifikasi');
            $table->string('foto_laporan')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('pelapor_id')->nullable();
            $table->timestamps();
        });

        DB::table('data_jalans')->insert([
            'id'=>1,
            'start_latitude'=>'-8.477629',
            'start_longitude'=>'114.331517',
            'end_latitude'=>'-8.481046',
            'end_longitude'=>'114.331646',
            'level_jalan'=>'rusak',
            'kecepatan'=>'20',
            'status_verifikasi'=>'disetujui',
          
            'created_at'=>'2022-03-21 04:29:46',
            'updated_at'=>'2022-03-21 04:29:46'


        ]);

        DB::table('data_jalans')->insert([
            'id'=>2,
            'start_latitude'=>'-8.473848',
            'start_longitude'=>'114.321936',
            'end_latitude'=>'-8.471441',
            'end_longitude'=>'114.321931',
            'level_jalan'=>'sedang',
            'kecepatan'=>'40',
         
            'status_verifikasi'=>'disetujui',
            'created_at'=>'2022-03-21 04:29:46',
            'updated_at'=>'2022-03-21 04:29:46'


        ]);

        DB::table('data_jalans')->insert([
            'id'=>3,
            'start_latitude'=>'-8.479231',
            'start_longitude'=>'114.332418',
            'end_latitude'=>'-8.479167',
            'end_longitude'=>'114.334489',
            'level_jalan'=>'rusak',
            'kecepatan'=>'20',

            'status_verifikasi'=>'disetujui',
            'created_at'=>'2022-03-21 04:29:46',
            'updated_at'=>'2022-03-21 04:29:46'


        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_jalans');
    }
}
