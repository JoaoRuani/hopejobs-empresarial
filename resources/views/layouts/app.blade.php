@extends('layouts.base')

@section('body')
    <div class="min-h-screen bg-gray-50">
        <x-navbar/>
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
    @yield('javascripts')
@endsection
