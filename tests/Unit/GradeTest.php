<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Grade;

class GradeTest extends TestCase
{
    public function test_grade_can_be_calculated_correctly()
    {
        $grade = new Grade(['grade' => 8]);
        $this->assertEquals(8, $grade->grade);
    }
}
