<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Movie extends Model
{
    use HasFactory;
    protected $guarded  = [''];
    public function RelationCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function MovieRelationTags()
    {
        return $this->belongsToMany(Tag::class, 'movie_tag');
    }
    public function RelationGenre(){
        return $this->hasOne(Genre::class,'id','genre');
    }
    public function RelationLanguage(){
        return $this->hasOne(Language::class,'id','language');
    }
}
