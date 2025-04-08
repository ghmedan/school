<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grade;
use App\Models\Sections;

class Classroom extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Class'];
    protected $table = 'Classrooms';
    public $timestamps = true;



    protected $guarded = [];



    public function Grades() //this is function relation sheep for table Grade
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    
}
