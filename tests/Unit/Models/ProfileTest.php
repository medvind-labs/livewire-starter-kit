<?php

declare(strict_types=1);

use App\Models\Profile;

test('profile has proper type definitions', function (): void {
    $profile = Profile::factory()->create();

    $profile->refresh();

    expect(array_keys($profile->toArray()))->toBe([
        'id', 'microsoft_id', 'microsoft_token', 'microsoft_refresh_token', 'microsoft_token_expires_at', 'created_at', 'updated_at',
    ]);
});
