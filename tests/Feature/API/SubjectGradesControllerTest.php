<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubjectGradesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_list_subject_grades()
    {
        $subject = Subject::factory()->create();
        Grade::factory()->count(3)->create(['subject_id' => $subject->id]);

        $response = $this->getJson("/api/subjects/{$subject->id}/grades");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'grade',
                         'student',
                     ],
                 ]);
    }

    public function test_can_create_grade_for_subject()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $data = ['grade' => 8];

        $response = $this->postJson("/api/subjects/{$subject->id}/grades/{$student->id}", $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data)
                 ->assertJsonStructure([
                     'grade',
                 ]);
    }
    public function test_can_delete_grade_for_subject()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();
        Grade::factory()->create(['subject_id' => $subject->id, 'student_id' => $student->id]);

        $response = $this->deleteJson("/api/subjects/{$subject->id}/grades/{$student->id}");

        $response->assertStatus(204);
    }
}
