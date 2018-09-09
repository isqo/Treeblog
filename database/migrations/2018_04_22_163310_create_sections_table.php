<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 30)->unique();
            $table->Boolean('hasContent')->default(false);
            $table->integer('section_id')->nullable()->unsigned();
            $table->integer('horizontal_position')->unsigned();
            $table->integer('vertical_position')->unsigned();
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Artisan::call('db:seed', [
                '--class' => 'SectionsSeeder',
                '--force' => true]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropForeign('sections_section_id_foreign');
        });


        Schema::dropIfExists('sections');
    }
}
