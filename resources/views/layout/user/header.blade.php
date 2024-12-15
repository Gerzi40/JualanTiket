<nav class="navbar navbar-expand-lg bg-d mb-5 position-sticky top-0 z-1">
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
                        href="{{ route('user.userEventList') }}">@lang('message.events')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-o" aria-current="page"
                        href="{{ route('user.getTransaction') }}">@lang('message.transactions')</a>
                </li>
            </ul>

            <form class="d-flex me-auto" role="search" method="POST" action="{{ route('user.userSearchEvent') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="@lang('message.search')" aria-label="Search"
                    name="inputSearch">
                <button class="btn bg-o text-d" type="submit">@lang('message.search')</button>
            </form>

            <div class="d-flex align-items-center ms-auto">
                <div class="dropdown me-3">
                    <button class="btn bg-o dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('message.language')
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="{{ route('setLocale', 'id') }}">Indonesia</a></li>
                        <li><a class="dropdown-item" href="{{ route('setLocale', 'en') }}">English</a></li>
                    </ul>
                </div>
                <a href="{{ route('auth.logout') }}" class="btn fs-5"
                    style="background-color: #EF8354; color: #2D3142">@lang('message.logout')</a>
            </div>


        </div>
    </div>
</nav>
