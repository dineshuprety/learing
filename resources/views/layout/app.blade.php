<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body>
    <header>
        @include('../components/header')
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        @include('../components/footer')
    </footer>

</body>

</html>