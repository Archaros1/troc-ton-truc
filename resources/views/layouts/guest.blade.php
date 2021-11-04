@extends('layouts.app')

@section('content')
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
@endsection
