<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [

        'title',
        'body'

    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    // protected $guarded = [];

    // public function has_tag($tag_id)
    // {
    //     $rows = \DB::table('tag_post')->where('tag_id', '=', $tag_id)->where('post_id', '=', $this->id)->get();

    //     if (count($rows) > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
