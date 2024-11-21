<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentGradesControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_list_student_grades()
    {
        $student = Student::factory()->create();
        Grade::factory()->count(3)->create(['student_id' => $student->id]);

        $response = $this->getJson("/api/students/{$student->id}/grades");

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'grade',
                         'subject',
                     ],
                 ]);
    }

    public function test_can_create_grade_for_student()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();

        $data = ['grade' => 9];

        $response = $this->postJson("/api/students/{$student->id}/grades/{$subject->id}", $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data)
                 ->assertJsonStructure([
                     'grade',
                 ]);
    }
    public function test_can_update_grade_for_student()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();
        Grade::factory()->create(['student_id' => $student->id, 'subject_id' => $subject->id]);

        $updatedData = ['grade' => 10];

        $response = $this->patchJson("/api/students/{$student->id}/grades/{$subject->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData)
                 ->assertJsonStructure([
                     'grade',
                 ]);
    }

    public function test_can_delete_grade_for_student()
    {
        $student = Student::factory()->create();
        $subject = Subject::factory()->create();
        Grade::factory()->create(['student_id' => $student->id, 'subject_id' => $subject->id]);

        $response = $this->deleteJson("/api/students/{$student->id}/grades/{$subject->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('grades', [
            'student_id' => $student->id,
            'subject_id' => $subject->id,
        ]);
    }

}
