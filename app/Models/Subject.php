<?php

namespace App\Models;

use App\Enums\Course;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'course',
    ];

    protected $casts = [
        'course' => Course::class,
    ];


    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
