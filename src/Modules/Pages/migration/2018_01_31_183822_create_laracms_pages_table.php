<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaracmsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laracms_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url')->unique();
            $table->string('layout');
            $table->timestamps();
        });

        Schema::create('laracms_page_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('laracms_page_id')->unsigned();
            $table->string('text');
            $table->string('locale')->index();

            $table->unique(['laracms_page_id','locale']);
            $table->foreign('laracms_page_id')->references('id')->on('laracms_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laracms_page_translations');
        Schema::dropIfExists('laracms_pages');
    }
}
