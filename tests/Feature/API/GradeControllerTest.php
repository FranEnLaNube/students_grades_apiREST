<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use App\Models\Grade;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GradeControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_get_overall_average()
    {
        Grade::factory()->count(5)->create(['grade' => 8]);

        $response = $this->getJson('/api/grades/overall-average');

        $response->assertStatus(200)
                 ->assertJsonFragment(['overall_average' => 8]);
    }
}
