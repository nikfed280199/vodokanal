<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExportControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExportReadingsToPDF()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/export/readings');
        $response->assertStatus(200);
    }

    public function testExportPaymentsToPDF()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/export/payments');
        $response->assertStatus(200);
    }
}
