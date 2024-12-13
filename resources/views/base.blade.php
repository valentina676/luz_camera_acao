<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: rgb(71, 56, 26); }
        .cta-btn { color:rgb(230, 161, 33); }
        .upgrade-btn { background:rgb(230, 161, 33); }
        .upgrade-btn:hover { background:rgb(230, 161, 33); }
        .active-nav-link { background: rgb(230, 161, 33); }
        .nav-item:hover { background: rgb(230, 161, 33); }
        .account-link:hover { background:rgb(230, 161, 33); }
    </style>
</head>
<body style="background-color: #82533d; color: #f4faec;" class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6 text-center">
            <a href="index.html" class="text-5xl font-bold uppercase hover:text-gray-300">Luz camera ação</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('index') }}" class="flex items-center active-nav-link py-4 pl-6 nav-item">
                <i class="fas fa-house-user mr-3"></i>
                Início
            </a>
            @if(Auth::user() && Auth::user()['user'])
                <a href="{{ route('receitas') }}" class="flex items-center text-white  py-4 pl-6 nav-item @if (Request::is('usuarios*')) active-nav-link @else opacity-75 hover:opacity-100 @endif">
                    <i class="fas fa-utensils mr-3"></i>
                    Minhas Receitas
                </a>
            @endif
            @if(Auth::user() && Auth::user()['admin'])
                <a href="{{ route('usuarios') }}" class="flex items-center text-white  py-4 pl-6 nav-item @if (Request::is('usuarios*')) active-nav-link @else opacity-75 hover:opacity-100 @endif">
                    <i class="fas fa-dragon mr-3"></i>
                    Usuários
                </a>
            @endif
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-yellow-950 py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">


                <span class="flex items-center mr-2">
                    @if (Auth::user())
                        {{ Auth::user()['nome'] }}
                    @else
                        Você não está autenticado
                    @endif
                </span>

                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-yellow-950 rounded-lg shadow-lg py-2 mt-16">
                    @if(Auth::user())
                        <a href="{{route('logout')}}" class="block px-4 py-2 account-link hover:text-white">Logout</a>
                    @else
                        <a href="{{route('login')}}" class="block px-4 py-2 account-link hover:text-white">Login</a>
                    @endif
                </div>
            </div>
        </header>


        {{-- Cores Fundo: bg-yellow-900, bg-amber-900, bg-orange-900 --}}

        <div class="w-full overflow-x-hidden border-t flex items-center">
            <main class="w-full flex-grow p-6 text-center items-center">
                    <div class="leading-loose">
                        @yield('conteudo')
                    </div>
            </main>
        </div>
        
    </div>

    
</body>
</html>
