@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <main class="py-5 mx-auto grid container grid grid-cols-1 lg:grid-cols-5 gap-2">
        <section class="flex-1 p-6 bg-white rounded-xl shadow-md col-span-3">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-indigo-600 text-2xl">Vagas</h1>
                <a href="{{route('job.create')}}" title="Editar">
                    <i class="material-icons text-indigo-500">add_circle_outline</i>
                </a>
            </div>
            @forelse($jobs as $job)
                <div class="shadow-sm p-3">
                    <h3>TITULO DA VAGA</h3>
                </div>
            @empty
                <div class="shadow-sm bg-indigo-100 rounded-md p-4">Você não possuir vagas!</div>
            @endforelse
        </section>
        <section class="p-6 bg-white rounded-xl shadow-md flex-1 order-first lg:order-none col-span-2 relative">
            <div class="flex space-x-2 items-center">
                <div class="flex-shrink-0 rounded-xl border-solid border-2 border-indigo-600 p-2">
                    <img class="h-16 " src="https://pt.freelogodesign.org/Content/img/logo-samples/flooop.png" alt="Logo">
                </div>
                <div>
                    <h2>{{empty($company->trading_name) ? $company->name : $company->trading_name}}</h2>
                </div>
                <a href="#" title="Editar">
                    <i class="material-icons text-indigo-500">create</i>
                </a>
            </div>
        </section>
    </main>
@endsection
