<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Subject;
use App\Enums\Course;

class SubjectTest extends TestCase
{
    public function test_subject_has_valid_course()
    {
        $subject = new Subject(['course' => Course::SECOND]);
        $this->assertEquals(Course::SECOND, $subject->course);
        $this->assertEquals('2n', $subject->course->value);
    }
}
