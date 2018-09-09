<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    protected $casts = [
        'already_installed' => 'boolean'
    ];

    protected $table = 'setup';

    public static function alreadyInstalled()
    {
        $installationRecord = Setup::where('already_installed', true)->first();
        return $installationRecord != null;
    }

    public static function install()
    {
        $installationRecord = Setup::where('already_installed', false)->first();
        if($installationRecord != null){
            $installationRecord->already_installed = true;
            $installationRecord->save();
        }
    }

}
