@extends('layouts.base')

@section('body')
    <div class="min-h-screen bg-gray-50">

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
    </div>
@endsection
