<nav
    class="flex justify-around items-center fixed top-0 drop-shadow-md bg-white w-full lg:p-3 p-0  md:justify-between z-10">

    <div class=" hidden  lg:flex  gap-4 flex-row-reverse text-lg whitespace-nowrap">
        <div class="hover:bg-gray-100 p-3 rounded-lg cursor-pointer">
            <button class="relative group">
                <h1>
                    تحميل التطبيق <i class="fa-solid fa-mobile-screen-button"></i>
                </h1>

                <div
                    class="hidden absolute top-16 -right-3 bg-white drop-shadow-md w-[300px] h-96 rounded-br-2xl
          rounded-bl-2xl border group-focus:flex flex-col gap-3 justify-around p-4 whitespace-nowrap">

                    <h1>او امسح رمز الكيو أر (QR) مباشرة</h1>

                    <div class="w-40 m-auto">
                        <img src="https://wasalt.com/images/wasalt_qr_header.svg" alt="" class="w-full">
                    </div>

                    <div class="w-40 m-auto">
                        <a href=""><img src="https://wasalt.com/images/AppStore.svg" alt=""
                                class="w-full"></a>
                    </div>
                    <div class="w-40 m-auto">
                        <a href=""><img src="https://wasalt.com/images/PlayStore.svg" alt=""
                                class="w-full"></a>
                    </div>


                </div>
            </button>



        </div>
{{--
        <div class="bg-main p-3 rounded-lg cursor-pointer text-white">
            <h1 class="flex flex-row-reverse items-center gap-3">
                إضافة عقار <i class="fa-solid fa-plus"></i>
            </h1>
        </div>

        <div class="hover:bg-gray-100 p-3 rounded-lg cursor-pointer">
            <a href="{{ route('login-page') }}">
                <h1>تسجيل الدخول <i class="fa-solid fa-user"></i></h1>
            </a>
        </div> --}}
{{--
        <div class="relative">
            <button class="hover:bg-gray-100 p-3 rounded-lg cursor-pointer">
                {{ LaravelLocalization::getCurrentLocaleNative() }}
            </button> --}}
            {{-- <ul class="absolute left-0 mt-2 bg-white border rounded-lg shadow-lg hidden ulCustomDeopDown">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul> --}}









            <div class="relative">
                {{-- <button onclick="toggleHidden('budget_dropDown')"
                    class="relative group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5 md:rounded-full">
                    <h1 class="flex flex-row-reverse items-center gap-2 text-gray-500">
                                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                     <i class="fa-solid fa-angle-down"></i>
                    </h1>
                </button> --}}


                {{-- <div id="budget_dropDown"
                    class="absolute right-0 hidden p-1 py-2 mt-2 bg-white border border-gray-300 rounded-lg shadow-lg">
                    <div class="w-full text-right">
                        <ul class="absolute left-0 mt-2 bg-white border rounded-lg shadow-lg hidden ulCustomDeopDown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div> --}}

            </div>







        </div>

        <!-- Add this script to handle the dropdown toggle -->

    </div>

    <a href="{{ route('home') }}" class="hidden lg:flex text-4xl uppercase  flex-col items-center  ">
      <img src="{{ asset('website/image/logo.png') }}" width="120">
    </a>

    <div class="hidden lg:flex   gap-4 flex-row-reverse text-lg whitespace-nowrap">
        <button id="mySearchBtn" class="group relative hover:bg-gray-100 p-3 rounded-lg cursor-pointer">
            <h1 class="flex flex-row-reverse items-center gap-1">
                بحث<i class="fa-solid fa-magnifying-glass"></i>
            </h1>

            <div
                class="search_dialog hidden absolute top-16 -right-3 bg-white drop-shadow-md w-[350px] h-48 rounded-tl-2xl rounded-bl-2xl border group-focus:flex flex-col gap-3 justify-around p-4">
                <div id="sell"
                    class="flex text-right items-center justify-around w-full hover:bg-gray-100 p-2 rounded-lg"
                    onclick="toggleSearchDialog('sell')">
                    <div>
                        <h1 class="">للبيع</h1>
                        <p class="text-gray-400 font-thin">عروض البيع في منطقتك</p>
                    </div>
                    <i class="fa-solid fa-tag text-3xl"></i>
                </div>

                <div id="rent"
                    class="  focus:bg-red-500 flex  text-right items-center justify-around  w-full hover:bg-gray-100 p-2 rounded-lg"
                    onclick="toggleSearchDialog('rent')">
                    <div>
                        <h1 class="">لليجار</h1>
                        <p class="text-gray-400 font-thin">عروض البيع في منطقتك</p>
                    </div>
                    <i class="fa-solid fa-key text-2xl"></i>
                </div>

            </div>
        </button>
        <div id="search_dialoag"
            class=" hidden  absolute top-[5rem] z-[2] left-0 bg-white w-4/5 ml-10 m-auto h-48 rounded-lg drop-shadow-lg justify-center items-center overflow-x-scroll">
            <div class="absolute top-5 right-8 cursor-pointer text-3xl" onclick="hideSearch_dialoag()"><i
                    class="fa-solid fa-xmark"></i></div>
            @foreach ($cities as $city)
                <div class="group text-center h-full p-2 cursor-pointer">
                    <a href="{{ route('real-estates.index', ['city_id' => $city->id, 'type' => 'hire']) }}">
                        <img src="{{ asset(optional($city->getFirstMedia('cities'))->getUrl()) }}" alt=""
                            class="h-4/5 rounded-lg group-hover:scale-110 transition-all w-[204px] h-[130px]" />
                        <h1 class="text-black">{{ $city->name }}</h1>

                    </a>
                </div>
            @endforeach
        </div>

        <div class="hover:bg-gray-100 p-3 rounded-lg cursor-pointer">

            <h1>
                <a href="{{ route('auctions.index') }}">{{ trans('lang.auctions.auctions') }}</a>
            </h1>
        </div>


        <div class="hover:bg-gray-100 p-3 rounded-lg cursor-pointer">
            <h1>
                <a href="{{ route('auctions.index') }}">@lang('lang.about us')</a>
            </h1>
        </div>


    </div>










    <!-- __________________small screens -->
    <div class="lg:hidden  flex hover:bg-gray-100 p-3 rounded-lg cursor-pointer z-50 mt-5">
        <h1>{{ LaravelLocalization::getCurrentLocaleNative() }} <i class="fa-solid fa-earth-americas"></i></h1>

    </div>

    <div class="lg:hidden  flex  w-44"><a href="/index.html"><img src="{{ asset('website/image/logo.svg') }}"
                alt="" class="w-full" /></a></div>


    <div class="lg:hidden  flex cursor-pointer" onclick="toggleMenuSM()"><i class="fa-solid fa-bars text-3xl"></i>
    </div>



</nav>

<div id="menuSm"
    class="hidden  absolute top-0 right-0 w-1/2 bg-white drop-shadow shadow-white  flex-col pt-2 p-3 h-[100vh] z-20">
    <div class="text-right cursor-pointer" onclick="toggleMenuSM()"><i class="fa-solid fa-xmark text-2xl "></i></div>

    <!-- search -->
    <div class="text-right p-2">
        <h1 class="text-black text-lg">بحث</h1>

        <div class="flex flex-col gap-4  mt-2">

            <button class="flex justify-between items-center flex-row-reverse cursor-pointer w-full"
                onclick="toggleDropdown('#dropdown-sell-container')">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-tag"></i>
                    <h1 class="text-xl">للبيع</h1>
                </div>
                <i class="fa-solid fa-angle-left"></i>
            </button>
            <!-- Dropdown sell Container -->
            <div id="dropdown-sell-container"
                class=" text-center w-full bg-white  border-gray-300  z-10  h-min hidden text-gray-400">
                <ul class="py-2">
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">الرياض</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">جدة</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">مكة</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">مدينة</a></li>
                </ul>
            </div>

            <button class="flex justify-between items-center flex-row-reverse cursor-pointer w-full"
                onclick="toggleDropdown('#dropdown-rent-container')">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-key"></i>
                    <h1 class="text-xl">للايجار</h1>
                </div>
                <i class="fa-solid fa-angle-left"></i>
            </button>

            <div id="dropdown-rent-container"
                class=" text-center w-full bg-white  border-gray-300  z-10  h-min hidden">
                <ul class="py-2 text-gray-400">
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">الرياض</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">جدة</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">مكة</a></li>
                    <li class="cursor-pointer px-4 py-2 hover:bg-gray-100 "><a href="">مدينة</a></li>
                </ul>
            </div>

            <hr>



        </div>



    </div>


    <!-- المزادات -->
    <div class="text-right p-2">
        <h1 class="text-black">المزادات</h1>

        <div class="flex flex-col gap-4  mt-2">

            <div class="flex justify-between items-center flex-row-reverse cursor-pointer w-full">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-file"></i>
                    <h1 class="text-xl">جميع المزادات</h1>
                </div>
            </div>
            <hr>

            <div class="flex justify-between items-center flex-row-reverse cursor-pointer w-full">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-file-alt"></i>
                    <div>
                        <h1 class="text-xl">اطلب عقارك</h1>
                        <p class="text-xs text-gray-400">شارك متطلباتك وتواصل مباشرة مع مسوّقينا.</p>

                    </div>
                </div>
            </div>
            <hr>

            <div class="flex justify-between items-center flex-row-reverse cursor-pointer w-full">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-blane"></i>
                    <div>
                        <h1 class="text-xl">المخططات</h1>
                        <p class="text-xs text-gray-400">احجز قطعة الأرض بكل سهولة من خلال الخريطة التفاعلية</p>

                    </div>
                </div>
            </div>
            <hr>

            <div
                class="bg-main p-3 rounded-lg cursor-pointer text-white flex justify-between items-center flex-row-reverse">
                <h1 class="flex flex-row-reverse items-center gap-3">
                    إضافة عقار
                </h1>
                <i class="fa-solid fa-plus"></i>
            </div>
        </div>

    </div>


    <!-- ملفك الشخصي -->
    <div class="text-right p-2 mt-1">
        <h1 class="text-black">ملفك الشخصي </h1>

        <div class="flex flex-col gap-4  mt-2">
            <div class="flex justify-between items-center flex-row-reverse cursor-pointer w-full">
                <div class="flex flex-row-reverse items-center gap-3">
                    <i class="fa-solid fa-user"></i>
                    <h1 class="text-xl">
                        تسجيل الدخول


                    </h1>
                </div>
            </div>
            <hr>



            <h1 class="text-black">المساعدة</h1>

            <a href="tel:20034771">
                <h1>استعلامات المزادات</h1>
                <div class="flex justify-end items-center gap-2">
                    <h1 class="text-gray-400">200347719</h1>
                    <i class="fa-solid fa-phone"></i>
                </div>
            </a>
            <a href="tel:2000034771">
                <h1>استعلامات العامة</h1>
                <div class="flex justify-end items-center gap-2">
                    <h1 class="text-gray-400">20000347719</h1>
                    <i class="fa-solid fa-phone"></i>
                </div>
            </a>






        </div>


    </div>


</div>
