<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Classroom;
use App\Models\Grade;

class fees extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title'];
    protected $guarded = [];




    public function Grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }
}
