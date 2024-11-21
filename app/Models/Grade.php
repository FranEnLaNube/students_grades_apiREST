<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'grade',
    ];

    public $incrementing = false;

    protected $keyType = null;

    protected $primaryKey = null;

    protected function setKeysForSaveQuery($query)
    {
        $query->where('student_id', $this->getAttribute('student_id'))
              ->where('subject_id', $this->getAttribute('subject_id'));

        return $query;
    }

    public function getKeyName()
    {
        return ['student_id', 'subject_id'];
    }

    public function getKeyType()
    {
        return null;
    }

    public function getKey()
    {
        return null;
    }
    public function is($model)
    {
        return $this->student_id === $model->student_id
            && $this->subject_id === $model->subject_id;
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
