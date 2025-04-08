<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends Factory<Profile>
 */
final class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<model-property<Profile>, mixed>
     */
    public function definition(): array
    {
        return [
            'microsoft_id' => fake()->word(),
            'microsoft_token' => Str::random(10),
            'microsoft_refresh_token' => Str::random(10),
            'microsoft_token_expires_at' => Carbon::now()->addSeconds(4000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
