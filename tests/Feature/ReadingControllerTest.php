<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Meter;
use App\Models\Reading;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAddReading()
    {
        $user = User::factory()->create();
        $meter = Meter::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->post('/readings', [
            'meter_id' => $meter->id,
            'value' => 100,
            'date' => now()->format('Y-m-d')
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('readings', [
            'meter_id' => $meter->id,
            'value' => 100,
        ]);
    }

    public function testViewReadings()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/readings');

        $response->assertStatus(200);
        $response->assertViewIs('readings.index');
    }
}
