<?php

namespace Taksu\TaksuInbox\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Taksu\TaksuInbox\Models\Broadcast;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Taksu\TaksuInbox\Models\Broadcast>
 */
class BroadcastFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Broadcast::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => (new Broadcast)->newUniqueId(),
            'title' => fake()->text(10),
            'type' => fake()->randomElement([
                Broadcast::TYPE_ANNOUNCEMENT,
                Broadcast::TYPE_NEWSLETTER,
                Broadcast::TYPE_CONSENT,
            ]),
            'can_respond_until' => now(),
            'status' => fake()->randomElement([
                Broadcast::STATUS_DRAFT,
                Broadcast::STATUS_PUBLISHED,
            ]),
            'published_at' => null,
            'content' => fake()->sentence(10),
            'respond_options' => [
                'Accept and sign',
                'Deny',
            ],
        ];
    }
}
