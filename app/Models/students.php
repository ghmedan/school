<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use OpenAI\Resources\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class students extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes; //تستخدم لعدم الحذف النهائي من قاعدة البيانات 

    // public $tiemstamp=true;

    public $translatable = ['name'];
    protected $guarded = [];
    



    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }

    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب

    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }


    //علاقة بين جدول الصور وجدول الطالب لجلب صور الطالب من جدول الصور باستخدام الدالة واعتبارها فورا كي
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }


    public function Nationality()
    {
        return $this->belongsTo('App\Models\Nationalities', 'nationalitie_id');
    }

    // علاقة بين الطلاب والاباء لجلب اسم الاب في جدول الاباء

    public function myparent()
    {
        return $this->belongsTo('App\Models\My_Parent', 'parent_id');
    }

    // علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
    public function student_account()
    {
        return $this->hasMany('App\Models\StudentAccount', 'student_id');
    }

    // علاقة بين جدول الطلاب وجدول الحضور والغياب
    public function attendance()
    {
        return $this->hasMany('App\Models\Attendace', 'student_id');
    }
}
