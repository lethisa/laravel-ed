<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Post extends Model
{
    public $directories = "/images/";
    use SoftDeletes;

    // protected $table = 'posts';

    // protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    // scope
    public static function scopeLatest($query)
    {
        return $query->orderBy('id', 'asc')->get();
    }

    // accessor
    public function getPathAttribute($value)
    {
        return $this->directories . $value;
    }

    // muttator
    // public function setPathAttribute($value)
    // {
    //     $dateAt = Carbon::now();
    //     $this->attributes['path'] = "img". $dateAt;
    // }
    
}
