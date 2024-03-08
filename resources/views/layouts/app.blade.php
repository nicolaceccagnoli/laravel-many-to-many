<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        {{-- Font-Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <div class="container">
                
            <nav>
                <ul class="">
                    <li>
                        <a href="/">Home</a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li>

                            <a href="{{ route('admin.projects.index') }}">I nostri progetti</a>

                        </li>
                        <li>

                            <a href="{{ route('admin.types.index') }}">Le tecnologie che utilizziamo</a>

                        </li>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="">
                        Log Out
                    </button>
                </form>
                   
            </nav>
            </div>
        </header>


        <main>
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
