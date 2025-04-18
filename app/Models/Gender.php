<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['Name'];
    public $timestamps = true;
    protected $table = 'genders';

    protected $guarded = [];
}
