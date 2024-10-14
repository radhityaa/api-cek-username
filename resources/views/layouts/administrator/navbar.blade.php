<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link gap-2">
            <img src="{{ asset('assets/img/logo.png') }}" width="40" height="40" alt="AyasyaTech">
            <span class="app-brand-text demo text-body fw-bold ms-1">AyasyaTech</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- Dashboard --}}
        <li class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- User Menu --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">User Menu</span>
        </li>
        <li class="menu-item {{ request()->is('games*') ? 'active' : '' }}">
            <a href="{{ route('games.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-device-gamepad-2"></i>
                <div>Daftar Game</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('api*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-flame"></i>
                <div>API</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('api/settings*') ? 'active' : '' }}">
                    <a href="{{ route('api.setting') }}" class="menu-link">
                        <div>Setting</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->is('api/documentations') ? 'active' : '' }}">
                    <a href="https://www.postman.com/restless-satellite-735972/workspace/public/collection/26190578-59d47fd5-6662-4eb5-ab81-1889a04c2a3c?action=share&creator=26190578"
                        class="menu-link" target="__blank">
                        <div>Dokumentasi</div>
                    </a>
                </li>
            </ul>
        </li>

        @role('admin')
            {{-- Admin Menu --}}
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Admin Menu</span>
            </li>
            <li class="menu-item {{ request()->is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>User</div>
                </a>
            </li>
        @endrole
    </ul>
</aside>
