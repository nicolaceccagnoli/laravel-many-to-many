<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li>

                                <a href="{{ route('projects.index') }}">I nostri progetti</a>
                                <a href="{{ route('technologies.index') }}">Le nostre Tecnologie</a>
                                <a href="{{ route('types.index') }}">I nostri linguaggi</a>
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Register</a>

                            </li>
                        @endauth
                    </li>
                </ul>

                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="">
                            Log Out
                        </button>
                    </form>
                @endauth
                
                
            </nav>
            </div>
        </header>

        <section id="guest">        
                <main>
                    
                    @yield('main-content')
                    
                </main>
        </section>
    </body>
</html>
