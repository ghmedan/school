<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
        use HasFactory;

    protected $guarded = [];

    //علاقة جدول الصور مع جدول الطالب لاخذ صور الطالب  من جدول الصور 
    public function imageable(){
        
        return $this->morphTo();
    }


}
