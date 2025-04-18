<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class OnlineClasse extends Model
{
    use HasFactory;
    // use HasTranslations;


    //protected $guarded=[''];
    public $fillable = ['integration', 'Grade_id', 'Classroom_id', 'section_id', 'user_id', 'meeting_id', 'topic', 'start_at', 'duration', 'password', 'start_url', 'join_url'];

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Sections', 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
