<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('kode_barang')->nullable()->unique();
            $table->unsignedBigInteger('suplier_id')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->integer('jenis')->comment('1=sarana,2=prasarana,3=lainnya');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
