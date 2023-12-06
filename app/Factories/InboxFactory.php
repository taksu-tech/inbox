<?php

namespace Taksu\TaksuInbox\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Taksu\TaksuInbox\Models\Inbox;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Taksu\TaksuInbox\Models\Inbox>
 */
class InboxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Inbox::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (new Inbox)->newUniqueId(),
            'owner_type' => fake()->randomElement([
                Inbox::OWNER_TYPE_STAFF,
                Inbox::OWNER_TYPE_CAREGIVER,
            ]),
            'owner_id' => fake()->uuid(),
            'source_type' => fake()->randomElement([
                Inbox::SOURCE_TYPE_ANNOUNCEMENT,
                Inbox::SOURCE_TYPE_NEWSLETTER,
            ]),
            'source_id' => fake()->uuid(),
            'category' => fake()->randomElement([
                'newsletter',
            ]),
            'title' => fake()->text(10),
            'content' => fake()->sentence(10),
            'read_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'response' => fake()->sentence(2),
            'response_url' => fake()->url(),
            'responded_at' => now(),
            'can_respond_until' => now(),
        ];
    }
}
