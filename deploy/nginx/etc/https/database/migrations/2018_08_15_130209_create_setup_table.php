<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Setup;

class CreateSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('already_installed')->default(false);
            $table->timestamps();
        });

        if (Setup::count() == 0) {
            Artisan::call('db:seed', [
                    '--class' => 'SetupSeeder',
                    '--force' => true]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setup');
    }
}
