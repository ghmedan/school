<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Degree extends Model
{

    protected $guarded = [];
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Models\students', 'student_id');
    }

    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizz', 'quizze_id');
    }
}
