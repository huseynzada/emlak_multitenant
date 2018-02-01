<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Announcement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('header',200)->nullable();
            $table->longText('content')->nullable();
            //features
            $table->string('site',100)->nullable();
            $table->string('type',50)->nullable();
            $table->tinyInteger("buldingType")->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->string("owner", 40)->nullable();

            $table->date('date')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}
