@php
    $menus = [
        'home'    => 'Home',
        'about'   => 'About',
        'program' => 'Program',
        'team'    => 'Our Team',
        'contact' => 'Contact Us',
    ];
@endphp

<nav class="sticky top-0 z-50 bg-gradient-to-r from-brand-700 to-brand-600 text-white shadow">
    <div class="container-page flex h-16 items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-3 text-xl font-bold">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Laundrycare"
                 class="h-10 w-auto rounded-lg bg-white object-contain p-0.5">
            <span>Laundrycare</span>
        </a>

        <button type="button" id="nav-toggle" aria-label="Menu"
                class="rounded p-2 hover:bg-white/10 md:hidden">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <ul id="nav-menu"
            class="absolute left-0 top-16 hidden w-full flex-col items-stretch gap-1 bg-brand-700 p-3 md:static md:flex md:w-auto md:flex-row md:items-center md:bg-transparent md:p-0">
            @foreach ($menus as $routeName => $label)
                <li>
                    <a href="{{ route($routeName) }}"
                       class="block rounded-lg px-4 py-2 text-sm font-medium transition hover:bg-white/10
                              {{ request()->routeIs($routeName) ? 'bg-white/20' : '' }}">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
            <li class="md:ml-3">
                <a href="{{ route('contact') }}"
                   class="block rounded-lg border border-white/50 bg-white/10 px-4 py-2 text-center text-sm font-semibold backdrop-blur transition hover:bg-white/25">
                    Book Online
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.getElementById('nav-toggle')
        .addEventListener('click', () => document.getElementById('nav-menu').classList.toggle('hidden'));
</script>