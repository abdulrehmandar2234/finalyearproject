<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{url('/')}}" class="sidebar-brand">
            Price<span>Compare</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('dashboard')}}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/roles') }}" class="nav-link" {{ request()->is('admin/roles') ? 'active' : '' }}
                ">
                <i class="link-icon" data-feather="shield"></i>
                <span class="link-title">Roles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/permissions') }}"
                   class="nav-link {{ request()->is('admin/permissions') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Permissions</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/users') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/sliders') }}"
                   class="nav-link {{ request()->is('admin/sliders') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="sliders"></i>
                    <span class="link-title">Sliders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/websites') }}"
                   class="nav-link {{ request()->is('admin/websites') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="monitor"></i>
                    <span class="link-title">Websites</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/currencies') }}"
                   class="nav-link {{ request()->is('admin/currencies') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Currencies</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/categories') }}"
                   class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/category-links') }}"
                   class="nav-link {{ request()->is('admin/category-links') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="link"></i>
                    <span class="link-title">Category Links</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/products') }}"
                   class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/product-nodes') }}"
                   class="nav-link {{ request()->is('admin/product-nodes') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Product Nodes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('advertising.index') }}"
                   class="nav-link {{ request()->is('admin/advertising') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="film"></i>
                    <span class="link-title">Advertising</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('banners.index') }}"
                   class="nav-link {{ request()->is('admin/banners') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Home Banner</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact.index') }}"
                   class="nav-link {{ request()->is('admin/contact') ? 'active' : '' }}">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Contact Us</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                           value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                           value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
    </div>
</nav>
