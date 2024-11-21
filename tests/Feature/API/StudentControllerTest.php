<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StudentControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_list_students()
    {
        Student::factory()->count(3)->create();

        $response = $this->getJson('/api/students');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id',
                         'name',
                         'surname',
                     ],
                 ]);
    }

    public function test_can_create_student()
    {
        $data = [
            'name' => 'John',
            'surname' => 'Doe',
            'age' => 20,
        ];

        $response = $this->postJson('/api/students', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data)
                 ->assertJsonStructure([
                     'id',
                     'name',
                     'surname',
                 ]);
    }
    public function test_can_delete_student()
    {
        $student = Student::factory()->create();

        $response = $this->deleteJson("/api/students/{$student->id}");

        $response->assertStatus(204);
    }

    public function test_can_update_student()
    {
        $student = Student::factory()->create();
        $updatedData = ['name' => 'Jane', 'surname' => 'Doe'];

        $response = $this->patchJson("/api/students/{$student->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);
    }
}
