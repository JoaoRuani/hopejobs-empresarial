@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="{{asset('css/vendor/selectize.css')}}">
@endsection
@section('content')
<main class="py-5 mx-auto container">
    <section class="p-6 bg-white rounded-xl shadow-md">
        <h1 class="text-indigo-600 text-2xl mb-4">Criar Vaga</h1>
        <form method="POST" action="{{route('job.store')}}">
            @csrf
            <div class="flex items-start space-x-3">
                <div class="mb-6 flex-1">
                    <label for="cargo" class="block text-sm font-medium text-gray-700 leading-8">Cargo</label>
                    <select id="cargo" name="jobRole" value="{{old('jobRole', '')}}">
                        @foreach($jobRoles as $role)
                            <option value="{{$role->id}}" {{ (old("jobRole") == $role->id ? "selected":"") }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('job_role')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 flex-1">
                    <label for="title" class="block text-sm font-medium text-gray-700 leading-5">
                        Título da vaga
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="title" type="text" required name="title" value="{{old('title', '')}}"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                    </div>
                    @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center space-x-5">
                <div class="mb-6 flex-1">
                    <label for="salario" class="block text-sm font-medium text-gray-700 leading-5">
                        Tipo de Contratação
                    </label>
                    <div class="mt-1 rounded-md shadow-sm relative">
                        <select id="hiringType" name="hiringType" value="{{old('hiringType', '')}}"
                                class="block appearance-none w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('hiringType') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror">
                            @foreach(\App\Enums\HiringTypes::asSelectArray() as $value => $description)
                                <option value="{{$value}}" {{ (old("hiringType") == $value ? "selected":"") }}>{{$description}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute right-0 top-3 flex items-center px-2 text-grey-darker">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="mb-6 flex-1">
                    <label for="salario" class="block text-sm font-medium text-gray-700 leading-5">
                        Salário
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <input id="salario" type="text" required name="salary" value="{{old('salary', '')}}"
                               class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('salary') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror"/>
                    </div>
                    @error('salary')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6 flex items-center mt-4">
                    <input id="match_salary" name="match_salary" type="checkbox" class="form-checkbox w-4 h-4 text-indigo-600 transition duration-150 ease-in-out" />
                    <label for="match_salary" class="block ml-2 text-sm text-gray-900 leading-5">
                        Salário a combinar
                    </label>
                </div>
            </div>
                <div class="mb-6 flex-1">
                    <label for="responsibilities" class="block text-sm font-medium text-gray-700 leading-5">
                        Responsabilidades do funcionário
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <textarea id="responsibilities" name="responsibilities" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('responsabilities') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror">
                        {{old('responsibilities', '')}}
                        </textarea>
                    </div>
                    @error('responsibilities')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            <div class="mb-6 flex-1">
                <label for="benefits" class="block text-sm font-medium text-gray-700 leading-5">
                    Benefícios para o funcionário
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <textarea id="benefits" name="benefits" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('benefits') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror">
                        {{old('benefits', '')}}
                    </textarea>
                </div>
                @error('benefits')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6 flex-1">
                <label for="observations" class="block text-sm font-medium text-gray-700 leading-5">
                    Observações
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <textarea id="observations" name="observations" required
                              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('observations') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror">
                        {{old('observations', '')}}
                    </textarea>
                </div>
                @error('observations')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <span class="block w-full rounded-md shadow-sm">
                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Finalizar Vaga
                    </button>
                </span>
            </div>
        </form>
    </section>
</main>
@endsection
@section('javascripts')
    <script src="{{asset('js/vendor/jquery.js')}}"></script>
    <script src="{{asset('js/vendor/selectize.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        $('#cargo').selectize({
            create: true,
            sortField: 'text'
        });
        CKEDITOR.replace( 'responsibilities', {
            language : 'pt-br',
            uiColor : '#a5b4fc',
        });
        CKEDITOR.replace( 'benefits' , {
            language : 'pt-br',
            uiColor : '#a5b4fc',
        });
        CKEDITOR.replace( 'observations' , {
            language : 'pt-br',
            uiColor : '#a5b4fc',
        });
    </script>
@endsection
