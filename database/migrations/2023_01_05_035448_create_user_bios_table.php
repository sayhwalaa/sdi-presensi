<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_bios', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->date('tgl_lahir');
            $table->tinyInteger('j_kelamin');
            $table->string('alamat');
            $table->string('no_telepon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_bios');
    }
}
