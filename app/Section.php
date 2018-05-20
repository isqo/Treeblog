<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $casts = [
        'entry_point' => 'boolean',
        'linkable' => 'boolean'
    ];

    public $timestamps = false;

    protected $table = 'sections';

    public function subSections()
    {
        return $this->hasMany('App\Section');
    }

    public static function getEntryPointSections()
    {
        return Section::with('subSections.subSections')->where('is_entry_point', true)->get();
    }

    public static function getSection($id)
    {
        return Section::with('subSections')->where('id', $id)->get();
    }

    public static function isEntryPoint($id)
    {
        $object = Section::where('id', $id)->first();
        if ($object)
            return $object->entry_point;
        return true;
    }
}
