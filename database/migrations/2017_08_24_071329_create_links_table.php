<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('favorites')->nullable();
            $table->text('from_url');
            $table->text('to_url');
            $table->text('anchor_text');
            $table->string('link_status')->nullable();
            $table->string('type')->nullable();
            $table->string('bldom')->nullable();
            $table->string('dompop')->nullable();
            $table->integer('power')->nullable();
            $table->integer('trust')->nullable();
            $table->integer('powertrust')->nullable();
            $table->string('alexa')->nullable();
            $table->string('ip')->nullable();
            $table->string('cntry')->nullable();
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
        Schema::dropIfExists('links');
    }
}
