<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Religion extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasTranslations;
    protected $fillable = ['Name'];
    public $translatable=['Name'];
   // protected $guarded=[]; //تسمح لجميع اسماء الاعمده باتعديل والحذف وجيع الصلاحيات

}
