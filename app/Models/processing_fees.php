<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\students;

class processing_fees extends Model
{
    use HasFactory;


    public function student()
    {
        return $this->belongsTo('App\Models\students', 'student_id');
    }
}
