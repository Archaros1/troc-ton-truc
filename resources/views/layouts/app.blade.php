<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('components.head')

<body class="font-sans antialiased">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</body>

</html>
