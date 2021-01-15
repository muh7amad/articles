<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'photo',
        'details',
        'thumb',
        'categoryId',

    ];

    public function category()
    {
        return $this->hasMany('App\Models\Category','id','categoryId');
    }

    public function favorited(){

        return (bool) Favorite::query()->where('user_id',Auth::id())->where('article_id',$this->id)->first();
    }
}
