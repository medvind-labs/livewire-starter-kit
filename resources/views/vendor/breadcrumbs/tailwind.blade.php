@unless ($breadcrumbs->isEmpty())
    <nav class="container mx-auto">
        <ol class="p-4 rounded flex flex-wrap items-center text-sm dark:text-zinc-500 tracking-wider">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li>
                        <a href="{{ $breadcrumb->url }}" class="text-zinc-700 dark:text-zinc-400 hover:text-blue-900 dark:hover:text-zinc-500 focus:text-blue-900 focus:underline" wire:navigate>
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

                @unless($loop->last)
                    <li class="text-gray-500 px-2">
                        @svg('fas-angle-right', 'size-2.5')
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
