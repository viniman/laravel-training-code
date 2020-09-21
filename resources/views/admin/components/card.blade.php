<div class="col-md-4">
    <div class="card">
        <div class="card-header">{{ $title }}</div>

        <div class="card-body text-center">
            <li class="nav-item has-treeview " style="list-style-type: none;">
                <a href="{{ route('users.index') }}"
                    class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
            <i class="nav-icon {{ $icon }}"></i>
                    <p >
                        {{ $title }}
                    </p>
                </a>
            </li>
            {{ $textInfo }}
        </div>
    </div>
</div>