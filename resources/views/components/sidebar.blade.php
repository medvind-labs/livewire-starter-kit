<x-pfc-sidebar wire:cloak>
    <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse px-4.5 py-4" wire:navigate>
        <x-app-logo />
    </a>

    <div class="pb-2">
        <a href="{{ route('dashboard') }}" class="flex text-gray-300 text-sm items-center mx-3 py-2 h-8 my-auto hover:bg-white/10 hover:border-white/20 border-2 border-transparent rounded-md" wire:navigate>
            <x-lucide-pie-chart class="size-4 text-zinc-300 mx-2.5" />
            <span class="text-sm" :class="collapsed ? 'hidden' : 'truncate'">{{ __('Dashboard') }}</span>
        </a>
    </div>

    <x-spacer />

    <div class="pb-2">
        <a href="https://github.com/medvind-labs/livewire-starter-kit" target="_blank" class="flex text-gray-300 text-sm items-center mx-3 py-2 h-8 my-auto hover:bg-white/10 hover:border-white/20 border-2 border-transparent rounded-md">
            <x-lucide-folder-git-2 class="size-4 text-zinc-300 mx-2.5" />
            <span class="text-sm" :class="collapsed ? 'hidden' : 'truncate'">{{ __('Repository') }}</span>
        </a>
    </div>

    <div class="pb-2">
        <a href="https://laravel.com/docs" target="_blank" class="flex text-gray-300 text-sm items-center mx-3 py-2 h-8 my-auto hover:bg-white/10 hover:border-white/20 border-2 border-transparent rounded-md">
            <x-lucide-book-open-text class="size-4 text-zinc-300 mx-2.5" />
            <span class="text-sm" :class="collapsed ? 'hidden' : 'truncate'">{{ __('Documentation') }}</span>
        </a>
    </div>

    <div class="pb-4">
        <a href="{{ route('settings.appearance') }}" class="flex text-gray-300 text-sm items-center mx-3 py-2 h-8 my-auto hover:bg-white/10 hover:border-white/20 border-2 border-transparent rounded-md" wire:navigate>
            <x-lucide-settings class="size-4 text-zinc-300 mx-2.5" />
            <span class="text-sm" :class="collapsed ? 'hidden' : 'truncate'">{{ __('Settings') }}</span>
        </a>
    </div>
</x-pfc-sidebar>
