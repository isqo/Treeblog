<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('content');
            $table->integer('section_id')->nullable()->unsigned();
            $table->boolean('is_commentable')->default(true);
        });

        Schema::table('pages', function(Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Artisan::call('db:seed', [
                '--class' => 'PagesSeeder',
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
        Schema::table('pages', function(Blueprint $table) {
            $table->dropForeign('pages_section_id_foreign');
        });

        Schema::dropIfExists('pages');
    }
}
