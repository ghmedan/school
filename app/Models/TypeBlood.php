<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TypeBlood extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable=['Name'];
   // protected $guarded=[]; //تسمح لجميع اسماء الاعمده باتعديل والحذف وجيع الصلاحيات
    protected $fillable = ['Name'];
    protected $table = 'type_bloods';  
 

}
