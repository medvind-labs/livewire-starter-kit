<?php

declare(strict_types=1);

use App\Models\User;

test('user has proper type definitions', function (): void {
    $user = User::factory()->create([
        'name' => 'Type Test',
        'email' => 'types@example.com',
        'job_title' => 'Developer',
    ]);

    $user->refresh();

    expect(array_keys($user->toArray()))->toBe([
        'id', 'name', 'email', 'job_title', 'email_verified_at', 'profile_id',  'created_at', 'updated_at', 'deleted_at',
    ]);
});
