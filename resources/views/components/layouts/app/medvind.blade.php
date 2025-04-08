@props(['header', 'title', 'description'])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'system';
            const isSystemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            // Apply the dark class to prevent FOUC
            if (theme === 'dark' || (theme === 'system' && isSystemDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }

            // Store the initial system preference
            localStorage.setItem('isSystemDark', isSystemDark);

            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (event) => {
                localStorage.setItem('isSystemDark', event.matches);
                if (theme === 'system') {
                    document.documentElement.classList.toggle('dark', event.matches);
                }
            });
        })();
    </script>

</head>
<body class="min-h-dvh bg-gray-200 dark:bg-zinc-800">

<div class="flex items-start h-full" x-data="{ collapsed: true,
            toggle() {
                this.collapsed = !this.collapsed;
                this.$dispatch('toggled');
            }
        }">

    <div class="sticky top-0">
        <x-sidebar />
    </div>

    <div class="flex-1 flex flex-col pt-2 px-6">
        <header class="flex items-center gap-x-2 pb-4">
            <button @click="toggle">
                @svg('lucide-panel-left', 'size-4 text-sky-950 dark:text-white')
            </button>
            <div>
                {{ Breadcrumbs::render() }}
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>
    </div>
</div>

@fluxScripts
</body>
</html>
