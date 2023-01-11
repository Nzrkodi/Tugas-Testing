<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'nilai',
        'student_id',
        'subject_id'
    ];

    public function student_code()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function subject_code()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
