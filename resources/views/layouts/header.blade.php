<nav class="navbar navbar-expand-lg navbar-light bg-info py-3 shadow-sm">
    <div class="container d-flex justify-content-between">
        <div class="d-flex">
            <a class="navbar-brand" href="#">KGB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item px-2 active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @if (auth()->user()->level == 'admin')
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('position') }}">Position</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('salary') }}">Salary</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('user') }}">User</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="{{ url('report') }}">Report</a>
                    </li>
                @endif
            </ul>
            </div>
        </div>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello <span>{{ auth()->user()->name }} !</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <form method="POST" action="{{ url('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                      </form>
                </div>
                </li>
            </ul>
        </div>
    </div>
  </nav>