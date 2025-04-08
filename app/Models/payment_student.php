<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_student extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function student()
    {
        return $this->belongsTo('App\Models\students', 'student_id');
    }
}
