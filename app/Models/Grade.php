<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Classroom;
use App\Models\Sections;

class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];

    protected $guarded = [];

    protected $table = 'Grades';
    public $timestamps = true;


    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة
    public function section()
    {
        return $this->hasMany('App\Models\Sections', 'Grade_id');
    }
}
