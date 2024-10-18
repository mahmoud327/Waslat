<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">{{ __('lang.Main Menu') }}</li>

                <!-- Dashboard -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span>{{ __('lang.Dashboard') }}</span>
                    </a>
                </li>

                <!-- Users & Roles Section -->
                <li class="menu-title">{{ __('lang.Users & Roles') }}</li>

                <li class="{{ Route::is('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span>{{ __('lang.Users') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('admins.index') ? 'active' : '' }}">
                    <a href="{{ route('admins.index') }}" class="waves-effect">
                        <i class="mdi mdi-shield-account-outline"></i>
                        <span>{{ __('lang.Admins') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-key-outline"></i>
                        <span>{{ __('lang.Roles') }}</span>
                    </a>
                </li>

                <!-- Management Section -->
                <li class="menu-title">{{ __('lang.Management') }}</li>

                <li class="{{ Route::is('categories.index') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="mdi mdi-shape-outline"></i>
                        <span>{{ __('lang.Category') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('features.index') ? 'active' : '' }}">
                    <a href="{{ route('features.index') }}" class="waves-effect">
                        <i class="mdi mdi-feature-search-outline"></i>
                        <span>{{ __('lang.Feature') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('auctions.index') ? 'active' : '' }}">
                    <a href="{{ route('auctions.index') }}" class="waves-effect">
                        <i class="mdi mdi-home-outline"></i>
                        <span>{{ __('lang.real estates') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('cities.index') ? 'active' : '' }}">
                    <a href="{{ route('cities.index') }}" class="waves-effect">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span>{{ __('lang.cities') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('banners.index') ? 'active' : '' }}">
                    <a href="{{ route('banners.index') }}" class="waves-effect">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span>{{ __('lang.banners') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('partners.index') ? 'active' : '' }}">
                    <a href="{{ route('partners.index') }}" class="waves-effect">
                        <i class="mdi mdi-city-variant-outline"></i>
                        <span>{{ __('lang.Partners') }}</span>
                    </a>
                </li>

                <!-- Contact & Settings Section -->
                <li class="menu-title">{{ __('lang.Settings & Support') }}</li>

                <li class="{{ Route::is('contact-us.index') ? 'active' : '' }}">
                    <a href="{{ route('contact-us.index') }}" class="waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span>{{ __('lang.Contact Us') }}</span>
                    </a>
                </li>

                <li class="{{ Route::is('settings.edit') ? 'active' : '' }}">
                    <a href="{{ route('settings.edit') }}" class="waves-effect">
                        <i class="mdi mdi-cog-outline"></i>
                        <span>{{ __('lang.Setting') }}</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
