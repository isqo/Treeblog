<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 255)->nullable();
            $table->text('content');
            $table->integer('section_id')->unsigned();
            $table->boolean('is_commentable')->default(true);
        });

        Schema::table('contents', function(Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contents', function(Blueprint $table) {
            $table->dropForeign('contents_section_id_foreign');
        });

        Schema::dropIfExists('contents');
    }
}
