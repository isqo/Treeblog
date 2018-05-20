<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->text('description');
            $table->boolean('has_content')->default(false);
            $table->boolean('is_entry_point')->default(false);
            $table->integer('section_id')->nullable()->unsigned();
        });

        Schema::table('sections', function(Blueprint $table) {
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
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_section_id_foreign');
        });


        Schema::dropIfExists('sections');
    }
}
