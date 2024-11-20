<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'surname',
        'age',
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
