
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
        <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('admin.dashboard') : route('home') }}" class="flex items-center gap-3 text-xl font-bold">
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

            @unless (auth()->check() && auth()->user()->role === 'admin')

            @foreach ($menus as $routeName => $label)
                <li>
                    <a href="{{ route($routeName) }}"
                       class="block rounded-lg px-4 py-2 text-sm font-medium transition hover:bg-white/10
                              {{ request()->routeIs($routeName) ? 'bg-white/20' : '' }}">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
            @endunless

                        @if (auth()->check() && auth()->user()->role === 'customer')
                <li>
                    <a href="{{ route('order.mine') }}"
                       class="block rounded-lg px-4 py-2 text-sm font-medium transition hover:bg-white/10
                              {{ request()->routeIs('order.mine') ? 'bg-white/20' : '' }}">
                        Pesanan Saya
                    </a>
                </li>
            @endif           
            @if (auth()->check() && auth()->user()->role === 'admin')
                <li class="md:ml-3">
                    <a href="{{ route('admin.dashboard') }}"
                       class="block rounded-lg border border-white/50 bg-white/10 px-4 py-2 text-center text-sm font-semibold backdrop-blur transition hover:bg-white/25">
                        Dashboard
                    </a>
                </li>
            @else
                <li class="md:ml-3">
                    <a href="{{ route('order.create') }}"
                       class="block rounded-lg border border-white/50 bg-white/10 px-4 py-2 text-center text-sm font-semibold backdrop-blur transition hover:bg-white/25">
                        Book Online
                    </a>
                </li>
            @endif

                        {{-- Tombol Login hanya tampil jika pengguna belum login --}}
            @guest
                <li>
                    <a href="{{ route('login') }}"
                       class="block rounded-lg bg-white px-4 py-2 text-center text-sm font-semibold text-blue-700 transition hover:bg-blue-50">
                        Login
                    </a>
                </li>
            @endguest

            {{-- Tombol Logout hanya tampil jika pengguna sudah login --}}
            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full rounded-lg bg-red-500 px-4 py-2 text-center text-sm font-semibold text-white transition hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                </li>
            @endauth

        </ul>
    </div>
</nav>

<script>
    document.getElementById('nav-toggle')
        .addEventListener('click', () => {
            document.getElementById('nav-menu').classList.toggle('hidden');
        });
</script>
