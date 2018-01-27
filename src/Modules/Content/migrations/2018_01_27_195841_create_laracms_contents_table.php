<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaracmsContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laracms_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('laracms_content_translations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('laracms_content_id')->unsigned();
            $table->string('value');
            $table->string('locale')->index();

            $table->unique(['laracms_content_id','locale']);
            $table->foreign('laracms_content_id')->references('id')->on('laracms_contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laracms_content_translations');
        Schema::dropIfExists('laracms_contents');
    }
}
