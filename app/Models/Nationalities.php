<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Nationalities extends Model
{
    use HasTranslations;
    public $translatable=['Name'];
    protected $fillable = ['Name'];

    protected $guarded=[]; //تسمح لجميع اسماء الاعمده باتعديل والحذف وجيع الصلاحيات

}
