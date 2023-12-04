<?php

namespace Taksu\TaksuInbox\Seeders;

use Illuminate\Database\Seeder;
use Taksu\TaksuInbox\Models\Inbox;

class InboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            Inbox::factory()->create([
                'title' => 'Inbox '.$i,
            ]);
        }
    }
}
