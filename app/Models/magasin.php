<?php

namespace App\Models;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magasin extends Model
{
    use HasFactory;
    protected $guarded=[''];
 public function articles(){
        return $this->belongsToMany(Article::class);
}
}
