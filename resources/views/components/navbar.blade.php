<header {{ $attributes->merge(['class' => 'bg-white py-3 shadow-md']) }}>
    <div class="container mx-auto flex justify-between items-center px-4 sm:px-0">
        <a href="{{ route('home') }} ">
            <h1 class="font-primary text-indigo-600 hover:text-indigo-500 text-right leading-3 pt-5 pb-2">
                <span class="text-4xl mb-0">HopeJobs</span><br>
                <span class="text-xs">Empresarial</span>
            </h1>
        </a>
        <nav>
            <div class="space-x-4">
                @auth
                    <a href="{{route('job.create')}}" class="font-primary text-indigo-600 border-solid border-2 p-3 rounded-md border-indigo-600 hover:bg-indigo-600 hover:text-white duration-150">Adicionar Vaga</a>
                    <a
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="font-primary text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150"
                    >
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-primary text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-primary text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Cadastrar-se</a>
                    @endif
                @endauth
            </div>
        </nav>
    </div>
</header>
