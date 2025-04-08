<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasFactory;
    // use HasTranslations;

    public $transaltable = ['title'];

    public $guarded = [''];


    public function quizze()
    {
        return $this->belongsTo("App\Models\Quizz", 'quizze_id');
    }
}
