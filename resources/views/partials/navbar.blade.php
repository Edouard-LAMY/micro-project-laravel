<nav id="nav" class="py-4 navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="/">
            <img src="" alt="" class="logo">
            Logo APP
        </a>
        <button class="navbar-toggler hov" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('home')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.create')}}">New post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>

            <!-- # lien deconnection si user connecter sinon s'idenfier  # -->
            <div>
				<ul class="navbar-nav me-auto">
						@if (Route::has('login'))
						@auth
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/dashboard') }}" :active="request()->routeIs('dashboard')">Dashboard</a> 
						</li>
						@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">Login</a> 
						</li>
						
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">Register</a> 
						</li>
						@endif
						@endauth
						@endif
				</ul>
			</div>

            <div>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <button class="nav-link btn btn-outline-secondary changeCursor" href="">
                            Cursor
                        </button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>