<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

final class SocialiteLoginController
{
    public function __invoke(): RedirectResponse
    {
        // @phpstan-ignore-next-line
        return Socialite::driver('microsoft')->scopes(['offline_access'])->redirect();
    }
}
