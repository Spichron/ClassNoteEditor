<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nots', function (Blueprint $table) {
            $table->id();
            $table->integer('ogrenci_no');
            $table->integer('yazili_1') ->nullable();
            $table->integer('yazili_2') ->nullable();
            $table->integer('yazili_3') ->nullable();
            $table->integer('performans_1') ->nullable();
            $table->integer('performans_2') ->nullable();
            $table->integer('proje') ->nullable();
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
        Schema::dropIfExists('nots');
    }
}
