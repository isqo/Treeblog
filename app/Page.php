<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];


    public static function getPage($title)
    {
        return Page::where('title', $title)->first();
    }

    public static function getRecentPages()
    {
        return Page::orderBy('created_at', 'desc')
        ->take(10)
        ->get();
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
