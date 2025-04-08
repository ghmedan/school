<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\Facades\Translatable;
use Spatie\Translatable\HasTranslations;
use App\Models\Grade;
use App\Models\Teacher;

use App\Models\Classroom;

class Sections extends Model
{
    use HasTranslations;

    public $translatable = ['Name_Section'];
    protected $guarded = [];

    public $timestamps = true;

    protected $table = 'Sections';



    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    //علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher', 'teacher_section', 'section_id', 'teacher_id');
    }
}
