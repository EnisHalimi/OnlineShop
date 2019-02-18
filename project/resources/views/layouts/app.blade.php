<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StarTech Online') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-laravel mx-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('images/logo.png') }}" class="img-responsive ">
                  
                </a>
                @guest
                @else
                <div class="row d-none d-sm-inline d-md-inline d-lg-none">
                        <h5 class="d-inline">{{ Auth::user()->name }}</h5>
                        <a class="d-none  d-md-inline d-lg-none" href="/cart"><i id="cart" class="
                            @if(App\Cart::getQuantity(auth()->user()->id) == 0)
                             fa fa-shopping-cart
                             @else fa fa-cart-arrow-down @endif " aria-hidden="true"></i></a>
                            <label for="sasia" class= "text-md-right mr-1 d-sm-none d-md-inline">Sasia</label>
                            <label for="sasia" class= "text-md-right mr-1 d-sm-inline d-md-none">S:</label>
                            <input class="form-control d-inline mb-1" value="{{App\Cart::getQuantity(auth()->user()->id)}} " type="text" name="quantity" id="quantity" readonly placeholder="Sasia" />
                            <label for="vlera" class="  text-md-right mr-1 d-sm-none d-md-inline">Vlera</label>
                            <label for="vlera" class="  text-md-right mr-1 d-sm-inline d-md-none">V:</label>
                            <input class="form-control d-inline" type="text"  value="{{number_format(App\Cart::getTotalPrice(auth()->user()->id),2)}} €" name="value" id="value" readonly placeholder="Vlera" />
                         
                @endguest
            </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else
                    <ul class="navbar-nav m-auto">
                    
                            
                            @if(Auth::user()->admin == 1)
                            <li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('home') mr-1" href="/">Kryefaqja</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link hvr-underline-from-left @yield('midland') mr-1" href="/midland">Midland</a>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left  @yield('users') mr-1" href="/user">Përdoruesit</a>
                            </li>
                           <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('porosite') mr-1" href="/order">Porositë</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('shporta') mr-1" href="/cart">Shporta</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('menaxhimi') mr-1" href="/menaxhimi">Menaxhimi</a>
                            </li>
							<li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('aksion') mr-1" href="/aksion">Aksionet</a>
                            </li>
							<li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('picture') mr-1" href="/picture">Imazhet</a>
                            </li>
            
                            @elseif(Auth::user()->admin == 2)
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('home') mr-1" href="/">Kryefaqja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('midland') mr-1" href="/midland">Midland</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('porosite') mr-1" href="/order">Porositë</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('shporta') mr-1" href="/cart">Shporta</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('menaxhimi') mr-1" href="/menaxhimi">Menaxhimi</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('home') mr-1" href="/">Kryefaqja</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('midland') mr-1" href="/midland">Midland</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('porosite') mr-1" href="/order">Porositë</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link hvr-underline-from-left @yield('shporta') mr-1" href="/cart">Shporta</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link hvr-underline-from-left @yield('menaxhimi') mr-1" href="/menaxhimi">Menaxhimi</a>
                            </li>
                              
                            @endif
                         
                    </ul>
                    @endguest

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto  ">
                        <!-- Au thentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                        @else

                            <li class="nav-item mb-1 d-none d-lg-block">
                                    <div class="container">
                                    <p>{{ Auth::user()->name }}</p>
                                    <a class="btn btn-primary" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Log out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                              
                            </li>
                            <li class="nav-item d-none d-lg-block">
                                <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-2 table-responsivecol-md-1 col-sm-1 col-xs-1">
                                        <a  href="/cart"><i id="cart" class="d-none d-xl-block 
                                            @if(App\Cart::getQuantity(auth()->user()->id) == 0)
                                            
                                            
                                             fa fa-shopping-cart
                                             @else fa fa-cart-arrow-down @endif " aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-7 col-md-2 col-sm-3 col-xs-3"> 
                                        <div class="row">
                                            <label for="sasia" class="col-md-4 col-form-label text-md-right">Sasia</label>
                                            <div class="col-md-8">
                                                <input class="form-control d-block mb-1" value="{{App\Cart::getQuantity(auth()->user()->id)}} " type="text" name="quantity" id="quantity" readonly placeholder="Sasia" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="vlera" class="col-md-4 col-form-label text-md-right">Vlera</label>
                                            <div class="col-md-8">
                                                <input class="form-control d-block" type="text"  value="{{number_format(App\Cart::getTotalPrice(auth()->user()->id),2)}} €" name="value" id="value" readonly placeholder="Vlera" />
                                            </div>
                                        </div>
                                    
                                   </div>
                                </div>
                            </div>
                            </li>
                            <li class="nav-item d-lg-none">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Log out') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                            </li>
                            <div class=" d-sm-none dropdown-divider"></div>
                            <li class="nav-item d-sm-none">
                                <p>{{ Auth::user()->name }}</p>
                                   <p>Sasia: {{App\Cart::getQuantity(auth()->user()->id)}}</p>
                                   <p>Vlera: {{number_format(App\Cart::getTotalPrice(auth()->user()->id),2)}} €</p>
                            </li>
                           
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid mx-auto">
              @if(session('error'))
	            <div class="alert alert-danger w-50 mx-auto ">
		            {{session('error')}}
	            </div>
            @endif
            @if(session('success'))
	            <div id="success" class="alert alert-success w-50 mx-auto">
		            {{session('success')}}
	            </div>
            @endif
               
            @if ($errors->any())
            <div class="alert w-50 alert-danger mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @yield('content')
            </div>
        </main>
    </div>


</body>
</html>
