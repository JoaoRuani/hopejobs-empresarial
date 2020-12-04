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
                <div class="shadow-md p-3 rounded-lg mb-5">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-indigo-600 text-xl">{{$job->title}}</h3>
                        <em class="text-sm">Criada em {{$job->created_at->format('d/m/Y')}}</em>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <p><strong>Tipo Contratação:</strong> {{\Illuminate\Support\Str::upper($job->hiringType->description)}}</p>
                        <p><strong>Cargo:</strong> {{$job->jobRole->name}}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <a href="{{route('job.show', ['job' => $job->id])}}" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">Ver Detalhes</a>
                        <p><strong>Candidatos:</strong> {{$job->applications()->where('status', '!=', \App\Enums\ApplicationStatus::IGNORED)->count()}}</p>
                    </div>

                </div>
            @empty
                <div class="shadow-sm bg-indigo-100 rounded-md p-4">Você não possuir vagas!</div>
            @endforelse
        </section>
        <section class="p-6 bg-white rounded-xl shadow-md flex-1 order-first lg:order-none col-span-2 relative">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                <div class="flex-shrink-0 rounded-xl border-solid border-2 border-indigo-600 p-2">
                    <img class="h-16 w-16" src="{{$company->image->url}}" alt="Logo">
                </div>
                <div>
                    <h2>{{empty($company->trading_name) ? $company->name : $company->trading_name}}</h2>
                </div>
                </div>
                <a href="{{route('company.edit')}}" title="Editar">
                    <i class="material-icons text-indigo-500">create</i>
                </a>
            </div>
        </section>
    </main>
@endsection
