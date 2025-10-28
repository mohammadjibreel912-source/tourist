<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Pacific Travel Agency')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <!-- Add other CSS files -->
</head>
<body>

    {{-- Include header --}}
    @include('admim.layouts.header')

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Include footer --}}
    @include('admim.layouts.footer')

    <!-- JS -->
    <!-- Add other JS files -->

</body>
</html>
