<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubjectControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_list_subjects()
    {
        Subject::factory()->count(2)->create();

        $response = $this->getJson('/api/subjects');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     '*' => [
                         'id',
                         'name',
                         'course',
                     ],
                 ]);
    }

    public function test_can_create_subject()
    {
        $data = [
            'name' => 'Maths',
            'course' => '2n',
        ];

        $response = $this->postJson('/api/subjects', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data)
                 ->assertJsonStructure([
                     'id',
                     'name',
                     'course',
                 ]);
    }
    public function test_can_update_subject()
    {
        $subject = Subject::factory()->create();
        $updatedData = ['name' => 'Updated Science'];

        $response = $this->patchJson("/api/subjects/{$subject->id}", $updatedData);

        $response->assertStatus(200)
                 ->assertJsonFragment($updatedData);
    }

    public function test_can_delete_subject()
    {
        $subject = Subject::factory()->create();

        $response = $this->deleteJson("/api/subjects/{$subject->id}");

        $response->assertStatus(204);
    }
}
