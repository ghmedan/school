<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class promotion extends Model
{
    use HasFactory;
    use HasTranslations;



    public $translatable =['name','Name', 'Name_Class', 'Name_Section'];
    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo('App\Models\Students', 'student_id');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function f_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'from_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function f_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'from_Classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function f_section()
    {
        return $this->belongsTo('App\Models\Sections', 'from_section');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة في جدول الترقيات

    public function t_grade()
    {
        return $this->belongsTo('App\Models\Grade', 'to_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف في جدول الترقيات

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'to_Classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم  في جدول الترقيات

    public function t_section()
    {
        return $this->belongsTo('App\Models\Sections', 'to_section');
    }
}
