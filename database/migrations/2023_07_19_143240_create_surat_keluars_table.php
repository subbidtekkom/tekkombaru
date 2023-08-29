<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('no_agenda');
            $table->string('no_surat');
            $table->string('jenis_surat');
            $table->string('asal_surat');
            $table->text('perihal');
            $table->string('kka');
            $table->string('dasar_surat');
            $table->date('tgl_surat');
            $table->string('jam_surat');
            $table->string('disposisi');
            $table->string('distribusi');
            $table->text('isi_disposisi');
            $table->string('feedback');
            $table->string('file')->nullable(true);
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
        Schema::dropIfExists('surat_keluars');
    }
};