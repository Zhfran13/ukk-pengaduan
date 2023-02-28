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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tgl_pengaduan')->useCurrent();
            $table->string('judul');
            // $table->foreign('nik', 16);
            $table->char('user_nik', 16);
            $table->text('isi_laporan');
            $table->text('foto')->nullable();
            $table->enum('status', ['0', 'proses', 'selesai'])->default('0');
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
        Schema::dropIfExists('pengaduans');
    }
};
