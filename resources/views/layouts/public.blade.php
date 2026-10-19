<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundrycare - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-white text-neutral-800 antialiased">

    @include('partials.navbar')

    <main class="container-page flex-1 py-12">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>