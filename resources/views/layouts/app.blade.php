<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    
                                </div> --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      </div>
      <p></p>  
        <div class="container-fluid">
            <div class="row">
              <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="/dashboard">
                        <span data-feather="home"></span>
                        Dashboard <span class="sr-only">(current)</span>
                      </a>
                    </li>
                   
                  </ul>
                  @guest

                  @else

                  @if(Auth::user()->roleid < 2)

                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>User Management</span>
                  </h6>
                  <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                      <a class="nav-link" href="/roles">
                            <span data-feather="file-text"></span>
                        Roles
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/users">
                            <span data-feather="file-text"></span>
                        Users
                      </a>
                    </li>
                  </ul>

                  @endif

                  

                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Expense Management</span>
                      </h6>
                      <ul class="nav flex-column mb-2">

                          @if(Auth::user()->roleid < 2)

                        <li class="nav-item">
                          <a class="nav-link" href="/categories">
                                <span data-feather="file-text"></span>
                            Expense Categories
                          </a>
                        </li>

                        @endif

                        <li class="nav-item">
                          <a class="nav-link" href="/expenses">
                                <span data-feather="file-text"></span>
                            Expenses
                          </a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                           </a>

                        </li>
                        

                      </ul>
                @endguest
                </div>
              </nav>
      
              <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    
                @include('inc.message')
                @yield('content')

      
      
                
              </main>
            </div>
          </div>
        

        
   

<!-- Bootstrap core JavaScript
                  ================================================== -->
                  <!-- Placed at the end of the document so the pages load faster -->
                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
                  <script src="../../assets/js/vendor/popper.min.js"></script>
                  <script src="../../dist/js/bootstrap.min.js"></script>
              
                  <!-- Icons -->
                  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                  <script>
                    feather.replace()
                  </script>
              
                  <!-- Graphs -->
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
                  <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                        datasets: [{
                          data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                          lineTension: 0,
                          backgroundColor: 'transparent',
                          borderColor: '#007bff',
                          borderWidth: 4,
                          pointBackgroundColor: '#007bff'
                        }]
                      },
                      options: {
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero: false
                            }
                          }]
                        },
                        legend: {
                          display: false,
                        }
                      }
                    });
                  </script>


</body>
</html>
