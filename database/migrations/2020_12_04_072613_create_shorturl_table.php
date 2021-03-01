<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShorturlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shorturl', function (Blueprint $table) {
            $table->id();
            $table->longText('originalurl');
            $table->longText('backupurl')->nullable();
            $table->longText('urlkey');
            $table->longText('password')->nullable();
            $table->bigInteger('clicklimit')->nullable();
            $table->bigInteger('lasttime');
            $table->longText('devicetype')->nullable();
            $table->longText('country')->nullable();
            $table->longText('refer')->nullable();
            $table->longText('iplimit')->nullable();

            $table->bigInteger('userid');


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
        Schema::dropIfExists('shorturl');
    }
}
