
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Customer - Laundrycare</title>
</head>
<body>
    <h1>Dashboard Customer Laundrycare</h1>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    <p>Di sini kamu bisa melihat dan mengelola pesanan laundry.</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
