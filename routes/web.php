<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingRealEstateController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\NotificationRealEstateController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UiElementsController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/test', function () {
    User::create([
        'email'=>'admin@gmail.com',
        'name'=>'admin',
        'password'=>bcrypt('admin'),
    ]);
    return view('welcome');
});
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.check');
Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('cities', CityController::class);
    Route::resource('states', StateController::class);
    Route::resource('users', UserController::class);
    Route::resource('booking-real-estates', BookingRealEstateController::class);
    Route::resource('notification-real-estates', NotificationRealEstateController::class);
    Route::resource('auctions', AuctionController::class);
    Route::post('/realestates/upload-images', [AuctionController::class,'uploadImages'])
    ->name('realestates.uploadImages');
    // routes/web.p
Route::post('/auctions/{id}/toggle-status', [AuctionController::class, 'toggleStatus'])->name('auctions.toggleStatus');
    Route::resource('contact-us', ContactUsController::class);
    Route::get('terms', [TermController::class,'edit'])->name('term.edit');
    Route::put('terms', [TermController::class,'update'])->name('terms.update');
    Route::get('settings', [SettingController::class,'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class,'update'])->name('settings.update');

// Calendar Route
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

// Email Routes
    Route::get('/email/inbox', [EmailController::class, 'inbox'])->name('email.inbox');
    Route::get('/email/read', [EmailController::class, 'read'])->name('email.read');
    Route::get('/email/compose', [EmailController::class, 'compose'])->name('email.compose');

// Layouts Routes
    Route::get('/layouts/light-sidebar', [LayoutsController::class, 'lightSidebar'])->name('layouts.light-sidebar');
    Route::get('/layouts/compact-sidebar', [LayoutsController::class, 'compactSidebar'])->name('layouts.compact-sidebar');
    Route::get('/layouts/icon-sidebar', [LayoutsController::class, 'iconSidebar'])->name('layouts.icon-sidebar');
    Route::get('/layouts/boxed', [LayoutsController::class, 'boxed'])->name('layouts.boxed');

// Horizontal Layouts Routes
    Route::get('/layouts/horizontal', [LayoutsController::class, 'horizontal'])->name('layouts.horizontal');
    Route::get('/layouts/hori-topbar-dark', [LayoutsController::class, 'horiTopbarDark'])->name('layouts.hori-topbar-dark');
    Route::get('/layouts/hori-boxed-width', [LayoutsController::class, 'horiBoxedWidth'])->name('layouts.hori-boxed-width');

// Authentication Routes
    Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/auth/recoverpw', [AuthController::class, 'recoverPassword'])->name('auth.recoverpw');
    Route::get('/auth/lock-screen', [AuthController::class, 'lockScreen'])->name('auth.lock-screen');

// Utility Pages Routes
    Route::get('/pages/starter', [PagesController::class, 'starter'])->name('pages.starter');
    Route::get('/pages/maintenance', [PagesController::class, 'maintenance'])->name('pages.maintenance');
    Route::get('/pages/comingsoon', [PagesController::class, 'comingSoon'])->name('pages.comingsoon');
    Route::get('/pages/timeline', [PagesController::class, 'timeline'])->name('pages.timeline');
    Route::get('/pages/faqs', [PagesController::class, 'faqs'])->name('pages.faqs');
    Route::get('/pages/pricing', [PagesController::class, 'pricing'])->name('pages.pricing');
    Route::get('/pages/404', [PagesController::class, 'error404'])->name('pages.404');
    Route::get('/pages/500', [PagesController::class, 'error500'])->name('pages.500');

// UI Elements Routes
    Route::get('/ui/alerts', [UiElementsController::class, 'alerts'])->name('ui.alerts');
    Route::get('/ui/badge', [UiElementsController::class, 'badge'])->name('ui.badge');
    Route::get('/ui/breadcrumb', [UiElementsController::class, 'breadcrumb'])->name('ui.breadcrumb');
    Route::get('/ui/buttons', [UiElementsController::class, 'buttons'])->name('ui.buttons');
    Route::get('/ui/cards', [UiElementsController::class, 'cards'])->name('ui.cards');
    Route::get('/ui/carousel', [UiElementsController::class, 'carousel'])->name('ui.carousel');
    Route::get('/ui/dropdowns', [UiElementsController::class, 'dropdowns'])->name('ui.dropdowns');
    Route::get('/ui/grid', [UiElementsController::class, 'grid'])->name('ui.grid');
    Route::get('/ui/images', [UiElementsController::class, 'images'])->name('ui.images');
    Route::get('/ui/lightbox', [UiElementsController::class, 'lightbox'])->name('ui.lightbox');
    Route::get('/ui/modals', [UiElementsController::class, 'modals'])->name('ui.modals');
    Route::get('/ui/offcanvas', [UiElementsController::class, 'offcanvas'])->name('ui.offcanvas');
    Route::get('/ui/rangeslider', [UiElementsController::class, 'rangeslider'])->name('ui.rangeslider');
    Route::get('/ui/session-timeout', [UiElementsController::class, 'sessionTimeout'])->name('ui.session-timeout');
    Route::get('/ui/pagination', [UiElementsController::class, 'pagination'])->name('ui.pagination');
    Route::get('/ui/progressbars', [UiElementsController::class, 'progressbars'])->name('ui.progressbars');
    Route::get('/ui/placeholders', [UiElementsController::class, 'placeholders'])->name('ui.placeholders');
    Route::get('/ui/sweet-alert', [UiElementsController::class, 'sweetAlert'])->name('ui.sweet-alert');
    Route::get('/ui/tabs-accordions', [UiElementsController::class, 'tabsAccordions'])->name('ui.tabs-accordions');
    Route::get('/ui/typography', [UiElementsController::class, 'typography'])->name('ui.typography');
    Route::get('/ui/toasts', [UiElementsController::class, 'toasts'])->name('ui.toasts');
    Route::get('/ui/video', [UiElementsController::class, 'video'])->name('ui.video');
    Route::get('/ui/popover-tooltips', [UiElementsController::class, 'popoverTooltips'])->name('ui.popover-tooltips');
    Route::get('/ui/rating', [UiElementsController::class, 'rating'])->name('ui.rating');

// Forms Routes
    Route::get('/form/elements', [FormController::class, 'elements'])->name('form.elements');
    Route::get('/form/validation', [FormController::class, 'validation'])->name('form.validation');
    Route::get('/form/advanced', [FormController::class, 'advanced'])->name('form.advanced');
    Route::get('/form/editors', [FormController::class, 'editors'])->name('form.editors');
    Route::get('/form/uploads', [FormController::class, 'uploads'])->name('form.uploads');
    Route::get('/form/xeditable', [FormController::class, 'xeditable'])->name('form.xeditable');
    Route::get('/form/wizard', [FormController::class, 'wizard'])->name('form.wizard');
    Route::get('/form/mask', [FormController::class, 'mask'])->name('form.mask');

// Tables Routes
    Route::get('/tables/basic', [TablesController::class, 'basic'])->name('tables.basic');
    Route::get('/tables/datatable', [TablesController::class, 'datatable'])->name('tables.datatable');
    Route::get('/tables/responsive', [TablesController::class, 'responsive'])->name('tables.responsive');
    Route::get('/tables/editable', [TablesController::class, 'editable'])->name('tables.editable');

// Charts Routes
    Route::get('/charts/apex', [ChartsController::class, 'apex'])->name('charts.apex');
    Route::get('/charts/chartjs', [ChartsController::class, 'chartjs'])->name('charts.chartjs');
    Route::get('/charts/flot', [ChartsController::class, 'flot'])->name('charts.flot');
    Route::get('/charts/knob', [ChartsController::class, 'knob'])->name('charts.knob');
    Route::get('/charts/sparkline', [ChartsController::class, 'sparkline'])->name('charts.sparkline');

// Icons Routes
    Route::get('/icons/remix', [IconsController::class, 'remix'])->name('icons.remix');
    Route::get('/icons/materialdesign', [IconsController::class, 'materialdesign'])->name('icons.materialdesign');
    Route::get('/icons/dripicons', [IconsController::class, 'dripicons'])->name('icons.dripicons');
    Route::get('/icons/fontawesome', [IconsController::class, 'fontawesome'])->name('icons.fontawesome');

// Maps Routes
    Route::get('/maps/google', [MapsController::class, 'google'])->name('maps.google');
    Route::get('/maps/vector', [MapsController::class, 'vector'])->name('maps.vector');
});

    });
