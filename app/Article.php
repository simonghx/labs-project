<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'articles_has_tags', 'articles_id', 'tags_id');
    }

    public function categorie(){
        return $this->belongsTo('App\Categorie', 'categorie_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Comment', 'articles_id', 'id');
    }
}
