<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\Profile;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Microsoft\MicrosoftUser;

final class SocialiteCallbackController
{
    public function __invoke(): RedirectResponse
    {
        /** @var MicrosoftUser $socialite */
        $socialite = Socialite::driver('microsoft')->user();

        /** @var Profile $profile */
        $profile = Profile::query()->updateOrCreate([
            'microsoft_id' => $socialite->getId(),
        ], [
            'microsoft_token' => $socialite->token,
            'microsoft_refresh_token' => $socialite->refreshToken,
            'microsoft_token_expires_at' => now()->addSeconds($socialite->expiresIn),
        ]);

        /** @var User $user */
        $user = $profile->user()->updateOrCreate([], [
            'email' => $socialite->getEmail(),
            'name' => $socialite->getName(),
            'job_title' => Arr::get($socialite->user, 'jobTitle', null),
        ]);

        if ($user->wasRecentlyCreated) {
            $user->update(['email_verified_at' => now()]);
        }

        Auth::login($user);

        return redirect()->intended(route('dashboard', absolute: true));
    }
}
