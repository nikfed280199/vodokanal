<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Meter;
use App\Models\Reading;
use App\Models\Payment;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $meters = Meter::factory(rand(2, 3))->create(['user_id' => $user->id]);

            foreach ($meters as $meter) {
                $this->createReadings($meter);
            }

            $this->createPayments($user);
        }
    }

    private function createReadings($meter)
    {
        $now = Carbon::now();
        for ($i = 0; $i < 6; $i++) {
            Reading::factory()->create([
                'meter_id' => $meter->id,
                'value' => rand(50, 150),
                'date' => $now->subMonth()->format('Y-m-d'),
            ]);
        }
    }

    private function createPayments($user)
    {
        for ($i = 0; $i < 3; $i++) {
            Payment::factory()->create([
                'user_id' => $user->id,
                'amount' => rand(200, 1000),
                'date' => Carbon::now()->subDays(rand(1, 180))->format('Y-m-d'),
                'status' => 'paid',
            ]);
        }
    }
}
