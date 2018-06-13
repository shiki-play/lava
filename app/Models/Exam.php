<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable = ['exam_id','quiz_id','content','section_1','section_2','section_3','section_4','answer'];
}
