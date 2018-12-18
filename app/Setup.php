<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Setup extends Model
{
    protected $casts = [
        'already_installed' => 'boolean'
    ];

    protected $table = 'setup';

    public function alreadyInstalled()
    {
        $installationRecord = null;

        if (Schema::hasTable('setup')) {
            $installationRecord = Setup::where('already_installed', true)->first();
        }
        return $installationRecord != null;
    }

    public static function install()
    {

        if (Schema::hasTable('setup')) {
            $installationRecord = Setup::where('already_installed', false)->first();
            if ($installationRecord != null) {
                $installationRecord->already_installed = true;
                $installationRecord->save();
            }
        }
    }

}
