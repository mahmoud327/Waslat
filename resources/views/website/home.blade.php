@extends('website.layouts.master')
@section('style')
    <style>
        .scroll-downs {
        margin: 10px auto;
        width :20px;
        height: 40px;
        scale: .7;
        }
        .mousey {
        width: 3px;
        padding: 10px 15px;
        height: 35px;
        border: 2px solid #3A564F;
        border-radius: 25px;
        opacity: 0.75;
        box-sizing: content-box;
        }
        .scroller {
        width: 3px;
        height: 15px;
        border-radius: 25%;
        background-color: #3A564F;
        animation-name: scroll;
        animation-duration: 2.2s;
        animation-timing-function: cubic-bezier(.15,.41,.69,.94);
        animation-iteration-count: infinite;
        }
        @keyframes scroll {
        0% { opacity: 0; }
        10% { transform: translateY(0);  }
        100% { transform: translateY(25px); opacity: 1;}
        }
    </style>

@endsection
@section('content')


    <div id="navBar"></div>

    <main class=" mt-52">
        <div
        class="w-full h-[13.5rem] md:h-96 rounded-none md:w-[600px] absolute top-16 left-0 lg:left-40 md:rounded-full overflow-hidden -z-10">
        <img src="{{ asset('website/image/homeBanner.svg') }}" alt="" class="w-full ">
    </div>



    <!-- ______ -->
    <div class="md:w-4/5 p-5 w-full m-auto   text-right flex flex-col items-end ">
        <h1 class="text-white md:text-black text-5xl font-semibold -translate-y-4">اطلب عقارك</h1>
        <div class="flex gap-4   m-2 text-gray-600  text-xl mr-5">
            <h1>شارك متطلباتك</h1><i class="fa-solid fa-file-pen"></i>
        </div>
        <div class="flex gap-4   m-2 text-gray-600  text-xl mr-5">
            <h1>تلقّ مكالمات من مسوقين عقاريين </h1><i class="fa-solid fa-phone"></i>
        </div>

        <div class="flex justify-center items-center ">
            <button id="btnRent"
                class="p-1 rounded-lg border mx-2 w-40  focus:border-[#6f10a2] focus:bg-[#6f10a2] focus:bg-opacity-5 ">
                للاستئجار
            </button>

            <button id="btnSell"
                class="p-1 rounded-lg border mx-2 w-40  focus:border-[#6f10a2] focus:bg-[#6f10a2] focus:bg-opacity-5  outline-none">
                للشراء
            </button>
        </div>


        <div>
            <div
                class="border relative rounded-md p-2 flex flex-row-reverse items-center md:w-[500px] h-16 bg-white drop-shadow-md m-3 overflow-hidden after:bottom-0 after:right-0 after:w-full after:h-1 after:absolute  after:rounded-lg after:bg-[#6f10a2]">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input id="HomeSearchInput" class=" md:w-4/5 outline-none mx-2 text-right" type="text"
                    placeholder="أدخل المدينة أو الحي المفضل">
            </div>

            <div class="flex justify-center items-center  m-2">
                <button
                    class="p-2 cursor-pointer m-1  hover:bg-[#6f10a2] border transition-all hover:text-white rounded-md">البحث
                    عن
                    عقارات</button>
                <button class="p-2 cursor-pointer m-1 bg-[#6f10a2] text-white rounded-md">اطلب عقارك الان</button>

            </div>
        </div>

    </div>
    <!-- ______ -->



    <!-- ______ -->
    <div
        class="bg-[#6f10a2] bg-opacity-10 w-full h-28 flex flex-col items-end md:items-center justify-around   md:flex-row-reverse mt-5 pr-2">

        <div class="flex items-center gap-3 text-2xl">
            <h1 class="text-gray-700 ">عروض عقارية موثقة</h1>
            <svg class="fill-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                id="verified-user">
                <path fill="none" d="M0 0h24v24H0V0z"></path>
                <path
                    d="M11.19 1.36l-7 3.11C3.47 4.79 3 5.51 3 6.3V11c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6.3c0-.79-.47-1.51-1.19-1.83l-7-3.11c-.51-.23-1.11-.23-1.62 0zm-1.9 14.93L6.7 13.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l5.88-5.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-6.59 6.59c-.38.39-1.02.39-1.41 0z">
                </path>
            </svg>
        </div>


        <div class="flex items-center gap-3 text-2xl">
            <h1 class="text-gray-700 ">معلومات وتفاصيل حقيقية</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" id="target">
                <g fill="none" fill-rule="evenodd" stroke="#1d74ff" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" transform="translate(1 1)">
                    <circle cx="10" cy="10" r="10"></circle>
                    <circle cx="10" cy="10" r="6"></circle>
                    <circle cx="10" cy="10" r="2"></circle>
                </g>
            </svg>
        </div>

        <div class="flex items-center gap-3 text-2xl">
            <h1 class="text-gray-700 ">فريق تسويقي محترف</h1>
            <svg class="h-10 fill-[#6f10a2]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="briefcase">
                <path
                    d="M4.5 28h23c1.378 0 2.5-1.122 2.5-2.5v-15C30 9.122 28.878 8 27.5 8h-5.11l-.526-2.106A2.497 2.497 0 0 0 19.438 4h-6.877a2.496 2.496 0 0 0-2.425 1.894L9.61 8H4.5A2.503 2.503 0 0 0 2 10.5v15C2 26.878 3.122 28 4.5 28zm23-1h-23c-.827 0-1.5-.673-1.5-1.5V15.17l10.5 3.111V21.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-3.219L29 15.17V25.5c0 .827-.673 1.5-1.5 1.5zM16 20a.5.5 0 0 0-.5.5v.5h-1v-2h3v2h-1v-.5a.5.5 0 0 0-.5-.5zm1.5-2.093V18h-3v-1h3v.907zM11.106 6.136A1.498 1.498 0 0 1 12.562 5h6.877a1.5 1.5 0 0 1 1.456 1.136L21.36 8H10.64l.466-1.864zM3 10.5C3 9.673 3.673 9 4.5 9h23c.827 0 1.5.673 1.5 1.5v3.626l-10.5 3.111V16.5a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 0-.5.5v.738L3 14.126V10.5z">
                </path>
            </svg>
        </div>

    </div>
    <!-- ______ -->



    <!-- ______ -->
    <div class="container p-10 text-right flex flex-col items-end mt-5">
        <h1 class="font-semibold text-black   text-4xl">اختيارات وصلت</h1>

        <div class="flex items-center gap-2  w-full  text-2xl justify-end mt-9 font-semibold">
            <h1 class="text-black"> فلل للبيع </h1>
            <svg class="h-14 fill-[#37084e]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="house">
                <path fill="#37084e"
                    d="M9.17 59.92c-.54 0-.97-.43-.97-.97V26.08c0-.54.43-.97.97-.97s.97.43.97.97v32.87c0 .54-.43.97-.97.97zm45.66 0c-.54 0-.97-.43-.97-.97V26.08c0-.54.43-.97.97-.97s.97.43.97.97v32.87c0 .54-.43.97-.97.97z">
                </path>
                <path fill="#2b2e63"
                    d="M59.56 30.52c-.75 0-1.47-.27-2.03-.77L32 7.17 6.48 29.75c-1.27 1.12-3.21 1-4.33-.27a3.056 3.056 0 0 1 .26-4.33L29.97.77a3.078 3.078 0 0 1 4.07 0L61.6 25.16c.61.54.98 1.29 1.03 2.11.05.82-.22 1.61-.77 2.22-.59.66-1.42 1.03-2.3 1.03zM32 4.9c.23 0 .46.08.64.24L58.81 28.3c.45.4 1.2.35 1.59-.1.2-.23.3-.52.28-.82-.02-.3-.15-.58-.38-.78L32.75 2.22a1.13 1.13 0 0 0-1.5 0L3.69 26.61c-.23.2-.36.48-.38.78a1.14 1.14 0 0 0 1.89.91L31.36 5.15c.18-.17.41-.25.64-.25zm7.99 55.02c-.54 0-.97-.43-.97-.97V36.09H24.98v22.86c0 .54-.43.97-.97.97s-.97-.43-.97-.97V35.12c0-.54.43-.97.97-.97h15.98c.54 0 .97.43.97.97v23.83c0 .54-.43.97-.97.97z">
                </path>
                <path fill="#2b2e63"
                    d="M37.53 29.32H26.47c-.54 0-.97-.43-.97-.97V17.29c0-.54.43-.97.97-.97h11.06c.54 0 .97.43.97.97v11.06c0 .54-.43.97-.97.97zm-10.09-1.94h9.12v-9.12h-9.12v9.12z">
                </path>
                <path fill="#2b2e63"
                    d="M32 29.32c-.54 0-.97-.43-.97-.97V17.29c0-.54.43-.97.97-.97s.97.43.97.97v11.06c0 .54-.43.97-.97.97z">
                </path>
                <path fill="#2b2e63"
                    d="M37.53 23.79H26.47c-.54 0-.97-.43-.97-.97s.43-.97.97-.97h11.06c.54 0 .97.43.97.97s-.43.97-.97.97zM59.8 64H4.2c-.54 0-.97-.43-.97-.97v-4.08c0-.54.43-.97.97-.97h55.6c.54 0 .97.43.97.97v4.08c0 .54-.43.97-.97.97zM5.16 62.06h53.67v-2.14H5.16v2.14z">
                </path>
            </svg>
        </div>
    </div>
    <!-- ______ -->


    <!-- Slider -->





    <!-- End Of Slider -->

    <!-- ______ -->

    <div class="bg-[#6f10a2] bg-opacity-10 w-full ">
        <div class="flex justify-around   flex-row-reverse mt-5 p-2 w-4/5 md:1/2 m-auto">

            <div class="text-right flex flex-col items-end gap-3">
                <h1 class="text-black text-4xl font-semibold">بيع أو أجر عقارك بكل سرعة وسهولة</h1>
                <p class="text-gray-600 text-lg">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق وصلت لبيع
                    وتأجير
                    العقار بالنيابة عنك بكل سهولة</p>
                <a href="" class="p-3 md:p-5 text-white bg-[#6f10a2] rounded-lg  text-3xl">أضف عقارك هنا</a>
            </div>

            <div class="hidden md:flex"><svg xmlns="http://www.w3.org/2000/svg" width="208" height="208"
                    fill="none">
                    <path
                        d="M183.719 106.713a43.807 43.807 0 0 0-3.462-2.113v-3.984h20.776a6.928 6.928 0 0 0 4.606-12.09l-21.92-19.605V17.48a6.928 6.928 0 0 0-6.925-6.929h-38.091a6.929 6.929 0 0 0-6.926 6.928v5.058L108.68 1.754a6.923 6.923 0 0 0-9.211 0l-96.96 86.6a6.928 6.928 0 0 0 4.606 12.262h20.777v100.456A6.93 6.93 0 0 0 34.818 208h138.513a6.925 6.925 0 0 0 6.926-6.928v-.485a55.416 55.416 0 0 0 27.705-45.978 55.444 55.444 0 0 0-5.937-27.08 55.414 55.414 0 0 0-18.306-20.816ZM41.744 194.144V93.688a6.93 6.93 0 0 0-6.926-6.928h-9.557l78.813-70.388 30.023 26.811a6.928 6.928 0 0 0 7.411 1.178 6.928 6.928 0 0 0 4.12-6.34V24.409h24.24v47.63a6.93 6.93 0 0 0 2.32 5.162l10.666 9.56h-9.523a6.924 6.924 0 0 0-6.926 6.928v5.196l-.9-.208-1.489-.346-1.662-.312c-.71-.14-1.427-.244-2.147-.311h-.866c-.969 0-1.939-.208-2.943-.278H152.554a55.392 55.392 0 0 0-32.887 10.758 55.419 55.419 0 0 0-20.094 28.178 54.049 54.049 0 0 0-2.424 16.211 55.436 55.436 0 0 0 16.067 39.005 40.757 40.757 0 0 0 1.766 1.697l.935.866H41.744Zm142.495-34.64H159.48v24.802a6.928 6.928 0 0 1-6.926 6.928 6.925 6.925 0 0 1-6.926-6.928v-24.802h-24.793a6.927 6.927 0 0 1 0-13.856h24.793v-24.802a6.93 6.93 0 0 1 6.926-6.928 6.925 6.925 0 0 1 6.926 6.928v24.802h24.759a6.925 6.925 0 0 1 6.925 6.928 6.927 6.927 0 0 1-6.925 6.928Z"
                        fill="#6F10A2" fill-opacity=".15" />
                </svg></div>

        </div>
        <hr>
    </div>
    <!-- ______ -->

    <hr class=" h-2 w-full mt-5">


    <!-- ______ -->
    <div class="flex justify-around flex-col  md:flex-row-reverse mt-5 p-2 w-[70%] m-auto">

        <div class=" text-center  md:text-right flex flex-col items-center md:items-end gap-3">
            <p class="text-gray-600 text-lg">المزادات</p>
            <h1 class="text-black text-4xl font-semibold">شارك في مزاداتنا الالكترونية الخاصة بالعقارات</h1>
            <a href="" class="p-3 md:p-5 text-white bg-[#6f10a2] rounded-lg  text-3xl">اكتشف المزادات</a>
        </div>

        <div class="w-full md:w-1/2 mt-2"><img src="{{asset('website/image/auction.png') }}" alt="">
        </div>
    </div>

    </main>


    <!-- ______ -->




    <!-- ______ -->


    <!-- ______ -->
@endsection
