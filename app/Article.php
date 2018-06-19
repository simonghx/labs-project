<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user() {
        return $this->belongsTo('App\Article', 'user_id', 'id');
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
