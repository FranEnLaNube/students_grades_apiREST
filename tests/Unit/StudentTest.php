<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{
    public function test_student_has_full_name()
    {
        $student = new Student(['name' => 'John', 'surname' => 'Doe']);
        $this->assertEquals('John Doe', "{$student->name} {$student->surname}");
    }
}
