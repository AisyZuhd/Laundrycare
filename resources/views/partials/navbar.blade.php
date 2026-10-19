@php
    $menus = [
        'home'    => 'Home',
        'about'   => 'About',
        'program' => 'Program',
        'team'    => 'Our Team',
        'contact' => 'Contact Us',
    ];
@endphp

<nav class="sticky top-0 z-50 bg-brand-600 text-white shadow">
    <div class="container-page flex h-16 items-center justify-between">
        <a href="{{ route('home') }}" class="text-xl font-bold">Laundrycare</a>

        <button type="button" id="nav-toggle" aria-label="Menu"
                class="rounded p-2 hover:bg-brand-700 md:hidden">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <ul id="nav-menu"
            class="absolute left-0 top-16 hidden w-full flex-col bg-brand-600 pb-3 md:static md:flex md:w-auto md:flex-row md:gap-1 md:pb-0">
            @foreach ($menus as $routeName => $label)
                <li>
                    <a href="{{ route($routeName) }}"
                       class="block rounded-lg px-4 py-2 text-sm font-medium transition hover:bg-brand-700
                              {{ request()->routeIs($routeName) ? 'bg-brand-700' : '' }}">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

<script>
    document.getElementById('nav-toggle')
        .addEventListener('click', () => document.getElementById('nav-menu').classList.toggle('hidden'));
</script>