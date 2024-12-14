<nav class="navbar navbar-expand-lg bg-d mb-5">
    <div class="container-fluid">
        <a class="navbar-brand text-o" href="{{ route('user.home') }}">Tiketin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-o" aria-current="page"
                        href="{{ route('user.userEventList') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-o" aria-current="page"
                        href="{{ route('user.getTransaction') }}">Transactions</a>
                </li>
            </ul>

            <form class="d-flex me-auto" role="search" method="POST" action="{{ route('user.userSearchEvent') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="inputSearch">
                <button class="btn bg-o text-d" type="submit">Search</button>
            </form>

            <a href="{{ route('auth.logout') }}" class="btn fs-5"
                style="background-color: #EF8354; color: #2D3142">Logout</a>
        </div>
    </div>
</nav>
