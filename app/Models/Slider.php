<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = ['title','title_en','sous_title','sous_title_en','paragraphe','paragraphe_en' ,'lien' ,'bg' ,'image'];
}
