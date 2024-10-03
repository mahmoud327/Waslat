<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        {{-- <span class="badge rounded-pill bg-primary float-end">3</span> --}}
                        <span>{{ __('lang.Dashboard') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('categories.index') }}" class="waves-effect">
                        <i class="mdi mdi-folder-outline"></i>
                        <span>{{ __('lang.Category') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.Users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('auctions.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.real estates') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact-us.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.Contact Us') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.edit') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.Setting') }}</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admins.index') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.Admins') }}</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('term.edit') }}" class="waves-effect">
                        <i class="mdi mdi-calendar-outline"></i>
                        <span>{{ __('lang.Terms and Conditions') }}</span>
                    </a>
                </li> --}}
{{--
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-email-outline"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('email.inbox') }}">Inbox</a></li>
                        <li><a href="{{ route('email.read') }}">Read Email</a></li>
                        <li><a href="{{ route('email.compose') }}">Email Compose</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="menu-title">Layouts</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-gradient"></i>
                        <span>Vertical</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('layouts.light-sidebar') }}">Light Sidebar</a></li>
                        <li><a href="{{ route('layouts.compact-sidebar') }}">Compact Sidebar</a></li>
                        <li><a href="{{ route('layouts.icon-sidebar') }}">Icon Sidebar</a></li>
                        <li><a href="{{ route('layouts.boxed') }}">Boxed Layout</a></li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-page-layout-header"></i>
                        <span>Horizontal</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('layouts.horizontal') }}">Default</a></li>
                        <li><a href="{{ route('layouts.hori-topbar-dark') }}">Topbar Dark</a></li>
                        <li><a href="{{ route('layouts.hori-boxed-width') }}">Boxed width</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                        <li><a href="{{ route('auth.register') }}">Register</a></li>
                        <li><a href="{{ route('auth.recoverpw') }}">Recover Password</a></li>
                        <li><a href="{{ route('auth.lock-screen') }}">Lock Screen</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-format-page-break"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pages.starter') }}">Starter Page</a></li>
                        <li><a href="{{ route('pages.maintenance') }}">Maintenance</a></li>
                        <li><a href="{{ route('pages.comingsoon') }}">Coming Soon</a></li>
                        <li><a href="{{ route('pages.timeline') }}">Timeline</a></li>
                        <li><a href="{{ route('pages.faqs') }}">FAQs</a></li>
                        <li><a href="{{ route('pages.pricing') }}">Pricing</a></li>
                        <li><a href="{{ route('pages.404') }}">Error 404</a></li>
                        <li><a href="{{ route('pages.500') }}">Error 500</a></li>
                    </ul>
                </li> --}}
{{--
                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span>UI Elements</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ui.alerts') }}">Alerts</a></li>
                        <li><a href="{{ route('ui.badge') }}">Badge</a></li>
                        <li><a href="{{ route('ui.breadcrumb') }}">Breadcrumb</a></li>
                        <li><a href="{{ route('ui.buttons') }}">Buttons</a></li>
                        <li><a href="{{ route('ui.cards') }}">Cards</a></li>
                        <li><a href="{{ route('ui.carousel') }}">Carousel</a></li>
                        <li><a href="{{ route('ui.dropdowns') }}">Dropdowns</a></li>
                        <li><a href="{{ route('ui.grid') }}">Grid</a></li>
                        <li><a href="{{ route('ui.images') }}">Images</a></li>
                        <li><a href="{{ route('ui.lightbox') }}">Lightbox</a></li>
                        <li><a href="{{ route('ui.modals') }}">Modals</a></li>
                        <li><a href="{{ route('ui.offcanvas') }}">Offcanvas</a></li>
                        <li><a href="{{ route('ui.rangeslider') }}">Range Slider</a></li>
                        <li><a href="{{ route('ui.session-timeout') }}">Session Timeout</a></li>
                        <li><a href="{{ route('ui.pagination') }}">Pagination</a></li>
                        <li><a href="{{ route('ui.progressbars') }}">Progress Bars</a></li>
                        <li><a href="{{ route('ui.placeholders') }}">Placeholders</a></li>
                        <li><a href="{{ route('ui.sweet-alert') }}">Sweetalert 2</a></li>
                        <li><a href="{{ route('ui.tabs-accordions') }}">Tabs & Accordions</a></li>
                        <li><a href="{{ route('ui.typography') }}">Typography</a></li>
                        <li><a href="{{ route('ui.toasts') }}">Toasts</a></li>
                        <li><a href="{{ route('ui.video') }}">Video</a></li>
                        <li><a href="{{ route('ui.popover-tooltips') }}">Popovers & Tooltips</a></li>
                        <li><a href="{{ route('ui.rating') }}">Rating</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ri-eraser-fill"></i>
                        <span class="badge rounded-pill bg-danger float-end">8</span>
                        <span>Forms</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('form.elements') }}">Form Elements</a></li>
                        <li><a href="{{ route('form.validation') }}">Form Validation</a></li>
                        <li><a href="{{ route('form.advanced') }}">Form Advanced Plugins</a></li>
                        <li><a href="{{ route('form.editors') }}">Form Editors</a></li>
                        <li><a href="{{ route('form.uploads') }}">Form File Upload</a></li>
                        <li><a href="{{ route('form.xeditable') }}">Form X-editable</a></li>
                        <li><a href="{{ route('form.wizard') }}">Form Wizard</a></li>
                        <li><a href="{{ route('form.mask') }}">Form Mask</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-table-2"></i>
                        <span>Tables</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('tables.basic') }}">Basic Tables</a></li>
                        <li><a href="{{ route('tables.datatable') }}">Data Tables</a></li>
                        <li><a href="{{ route('tables.responsive') }}">Responsive Table</a></li>
                        <li><a href="{{ route('tables.editable') }}">Editable Table</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-bar-chart-line"></i>
                        <span>Charts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('charts.apex') }}">Apex Charts</a></li>
                        <li><a href="{{ route('charts.chartjs') }}">Chartjs Charts</a></li>
                        <li><a href="{{ route('charts.flot') }}">Flot Charts</a></li>
                        <li><a href="{{ route('charts.knob') }}">Jquery Knob Charts</a></li>
                        <li><a href="{{ route('charts.sparkline') }}">Sparkline Charts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-brush-line"></i>
                        <span>Icons</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('icons.remix') }}">Remix Icons</a></li>
                        <li><a href="{{ route('icons.materialdesign') }}">Material Design</a></li>
                        <li><a href="{{ route('icons.dripicons') }}">Dripicons</a></li>
                        <li><a href="{{ route('icons.fontawesome') }}">Font Awesome</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-map-pin-line"></i>
                        <span>Maps</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('maps.google') }}">Google Maps</a></li>
                        <li><a href="{{ route('maps.vector') }}">Vector Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-share-line"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);">Level 1.1</a></li>
                        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);">Level 2.1</a></li>
                                <li><a href="javascript: void(0);">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
