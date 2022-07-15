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
        Schema::create('pengusulans', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->enum("status_usulan",[
                "Terima Usulan",
                "Tolak Usulan",
                "Berkas Disetujui",
                "Tidak Memenuhi Syarat"
            ]);
            $table->enum("jenis_layanan_nama",[
                "jabatan",
                "pensiun",
                "pendidikan",
                "cuti",
            ]);
            $table->date("tgl_usulan");
            $table->string("instansi_nama");
            $table->enum("tipe_usulan",["I","U"]);

            $table->string("satker_approval");
            $table->string("nip_validator")->nullable();
            $table->string("nama_validator")->nullable();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete();

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
        Schema::dropIfExists('pengusulans');
    }
};
