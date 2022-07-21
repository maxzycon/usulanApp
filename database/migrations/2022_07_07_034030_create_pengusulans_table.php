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
        Schema::create('usulan', function (Blueprint $table) {
            $table->string("id")->primary();
            $table->string("nama");
            $table->string("nip")->nullable();
            $table->string("status_usulan");
            $table->string("jenis_layanan_nama");
            $table->string("tgl_usulan");
            $table->string("instansi_nama");
            $table->enum("tipe_usulan",["I","U"]);

            $table->string("satker_approval");
            $table->string("nip_validator")->nullable();
            $table->string("nama_validator")->nullable();
            $table->foreign("satker_approval")->references("id")->on("users")->cascadeOnDelete();

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
        Schema::dropIfExists('usulan');
    }
};
