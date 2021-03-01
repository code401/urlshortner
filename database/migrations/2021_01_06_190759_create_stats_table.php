<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();

            $table->integer('clickconfirm')->nullable();
            $table->longText('os')->nullable();
            $table->longText('device')->nullable();
            $table->longText('browser')->nullable();
            $table->longText('country')->nullable();
            $table->longText('referer')->nullable();
            $table->date('clickdate')->nullable();
            $table->integer('clickhour')->nullable();
            $table->longText('userip')->nullable();
            $table->integer('failclick')->nullable();

            $table->longText('clicktime')->nullable();

            $table->integer('urlid')->nullable();
            $table->integer('userid')->nullable();
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
        Schema::dropIfExists('stats');
    }
}
