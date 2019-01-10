<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff5621;">
  <a class="navbar-brand" href="{{ route('books.all') }}">BookStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav">
        <li class="nav-item">
          <a href="{{ route('books.all') }}" class="nav-link text-white">Home</a>
        </li>
        @if(Session::has('user'))
        @if(Session::get('user')->role == 1)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin Manage
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('books.all') }}">Manage Books</a>
            <a class="dropdown-item" href="{{ route('genres.all') }}">Manage Genres</a>
            <a class="dropdown-item" href="{{ route('authors.all') }}">Manage Authors</a>
            <a class="dropdown-item" href="{{ route('users.all') }}">Manage Users</a>
            <a class="dropdown-item" href="{{ route('transactions.all') }}">View Transaction</a>
          </div>
        </li>
        @endif
        @endif
      </ul>

      <ul class="nav navbar-nav">
        @if(Session::has('user'))
        @if(Session::get('user')->role == 1)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin Create
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('books.insert') }}">Create Book</a>
            <a class="dropdown-item" href="{{ route('authors.insert') }}">Create Author</a>
            <a class="dropdown-item" href="{{ route('genres.insert') }}">Create Genre</a>
          </div>
        </li>
        @endif
        @endif
      </ul>

      <ul class="navbar-nav ml-auto">
        @if(Session::has('user'))
        @if(Session::get('user')->role == 0)
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('cart') }}">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('transactions.all') }}">Transaction History</a>
        </li>
        @endif
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome, {{ (Auth::check() == null) ? "Guest" : Auth::user()->name }} 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(!Session::has('user'))
            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
            @elseif(Session::has('user'))
            <a class="dropdown-item" href="{{ route('users.profile') }}">Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            @endif
          </div>
        </li>
        <li class="nav-item" style="pointer-events: none;">
          <a href="#" class="nav-link disabled text-white" id="serverTime"></a>
        </li>
      </ul>
  </div>
</nav>

{{-- <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('books.all') }}">{{config('app.name', 'Bookstore')}}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(Session::has('user'))
        @if(Session::get('user')->role == 1)
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Manage<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('books.all') }}">Books</a></li>
            <li><a href="{{ route('genres.all') }}">Genres</a></li>
            <li><a href="{{ route('authors.all') }}">Authors</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('users.all') }}">Users</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('transactions.all') }}">Transaction History</a></li>
          </ul>
        </li>
        @endif
        @endif
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if(Session::has('user'))
        @if(Session::get('user')->role == 0)
        <li><a href="{{ route('cart') }}">Cart</a></li>
        <li><a href="#">Transactions History</a></li>
        @endif
        @endif
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, 
            {{ (Auth::check() == null) ? "Guest" : Auth::user()->name }} 
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            @if(!Session::has('user'))
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @elseif(Session::has('user'))
            <li><a href="{{ route('users.profile') }}">Profile</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
            @endif
            @if(Session::has('user'))
            @if(Session::get('user')->role == 1)
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('books.insert') }}">Create Book</a></li>
            <li><a href="{{ route('genres.insert') }}">Create Genre</a></li>
            <li><a href="{{ route('authors.insert') }}">Create Author</a></li>
            @endif
            @endif
          </ul>
        </li>
        <li class="nav-item" style="pointer-events: none;">
          <a href="#" class="nav-link disabled" id="serverTime"></a>
        </li>
      </ul>
    </div>
  </div>
</nav> --}}