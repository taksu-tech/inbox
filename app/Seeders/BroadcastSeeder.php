<?php

namespace Taksu\TaksuInbox\Seeders;

use Illuminate\Database\Seeder;
use Taksu\TaksuInbox\Models\Broadcast;

class BroadcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            Broadcast::factory()->create();
        }
    }
}
