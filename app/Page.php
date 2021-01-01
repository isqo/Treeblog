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
    protected $fillable = ['content', 'title'];


    public static function getPage($title)
    {
        return Page::where('title', $title)->first();
    }

    public static function getRecentPages()
    {
        return Page::orderBy('created_at', 'desc')
            ->whereHas('section', function ($query) {
                $query->where('hasContent', '1');
            })
            ->take(8)
            ->get();
    }

    public static function getRecentPagesPartitioned()
    {
        //$post->section->hasContent
        return array_chunk(Page::getRecentPages()->all(), 4, false);
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
