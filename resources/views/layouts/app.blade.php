<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Explore360&deg; Jordan')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <!-- Add other CSS files -->
</head>
<body>

    {{-- Include header --}}
    @include('user.layouts.header')

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Include footer --}}
    @include('user.layouts.footer')

    <!-- JS -->
    <!-- Add other JS files -->

</body>
</html>
