    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="{{ route('welcome') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
        aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item {{ Route::is('welcome') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('welcome') }}">Welcome</a>
        </li>
        <li class="nav-item  {{ Route::is('data.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('data.index') }}">Data</a>
        </li>
        <li class="nav-item  {{ Route::is('login') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        </ul>

    </div>
    </div>
    </nav>