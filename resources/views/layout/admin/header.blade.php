<div class="dark-background light-color" style="width: 15%;">
    <div class="fs-2 fw-bold py-4 text-center">
        Tiketin
    </div>
    <a
        href="{{ route('admin.home') }}"
        class="d-block fs-6 text-decoration-none light-color py-2 px-3 {{ Route::is('admin.home') ? 'extra-light-background' : '' }}">
        Home
    </a>
    <a
        href="{{ route('admin.category') }}"
        class="d-block fs-6 text-decoration-none light-color py-2 px-3 {{ Route::is('admin.category') ? 'extra-light-background' : '' }}">
        Category
    </a>
    <a
        href="{{ route('admin.transaction') }}"
        class="d-block fs-6 text-decoration-none light-color py-2 px-3 {{ Route::is('admin.transaction') ? 'extra-light-background' : '' }}">
        Transaction
    </a>
</div>