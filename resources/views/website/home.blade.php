@extends('website.layouts.master')
@section('style')
    <style>
        .inline-gallery-container * {
            background: none;
            color: black;
        }


        .swiper-button-next.swiper-button-disabled,
        .swiper-button-prev.swiper-button-disabled,
        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            opacity: .35;
            cursor: auto;
            pointer-events: none;
            background: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #3a564f;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after,
        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            font-size: 28px;
            color: #3a564f;
        }

        .wrapper {
            max-width: 1100px;
            width: 100%;
            position: relative;
            direction: rtl;
            margin: auto;
            margin-top: 100px;
            padding: 50px;
            height: fit-content;
        }

        .wrapper .i {
            top: 50%;
            color: black;
            height: 50px;
            width: 50px;
            cursor: pointer;
            font-size: 1.25rem;
            position: absolute;
            text-align: center;
            line-height: 50px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
            transform: translateY(-50%);
            transition: transform 0.1s linear;
        }

        .wrapper .i:active {
            transform: translateY(-50%) scale(0.85);
        }

        .wrapper .i:first-child {
            left: -22px;
        }

        .wrapper .i:last-child {
            right: -22px;
        }

        .wrapper .carousel {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: calc((100% / 3) - 12px);
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 16px;
            border-radius: 8px;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        .carousel::-webkit-scrollbar {
            display: none;
        }

        .carousel.no-transition {
            scroll-behavior: auto;
        }

        .carousel.dragging {
            scroll-snap-type: none;
            scroll-behavior: auto;
        }

        .carousel.dragging .card {
            cursor: grab;
            user-select: none;
        }

        @media screen and (max-width: 900px) {
            .wrapper .carousel {
                grid-auto-columns: calc((100% / 2) - 9px);
            }
        }

        @media screen and (max-width: 600px) {
            .wrapper .carousel {
                grid-auto-columns: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div id="loader"
        class="fixed top-0 left-0 w-[100vw] h-[100vh]  flex items-center bg-white justify-center z-[999]  overflow-y-hidden">
        <div class="lds-dual-ring"></div>
    </div>

    <!-- home -->

    <main class=" md:mt-32 mt-14 ">


        <div class="w-full  overflow-hidden drop-shadow-lg px-10 mb-[50px]">
            <div class="swiper-container3 relative w-full m-auto ">
                <div class="swiper-wrapper drop-shadow-lg p-2">

                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <div class="relative">

                                @foreach ($banner->getMedia('banners') as $image)
                                    <div>

                                        <img class="rounded-md w-[100vw] h-[80vh]" src="{{ asset(optional($image)->getUrl()) }}"
                                            alt="Image 2">
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach

                </div>


                <!-- Add navigation arrows -->
                <div id="swiper-button-prev1" class="swiper-button-prev "></div>
                <div id="swiper-button-next1" class="swiper-button-next "></div>

            </div>



        </div>





        <div class="  flex  justify-around gap-5 flex-col md:flex-row  mx-5">
        </div>




        <div class=" container  rtl:text-right ltr:text-left flex flex-col items-end mt-5  m-auto">
            <h1 class="font-semibold text-black   text-4xl">اختيارات زمن</h1>



            @foreach ($categories as $category)
                <div class=" container rtl:text-right ltr:text-left flex flex-col items-end mt-5  m-auto px-[110px]">

                    <h1 class="text-black text-3xl mb-2"> {{ $category->title }} </h1>

                    <div class="w-full  overflow-hidden drop-shadow-lg">
                        <div class="swiper-container1 relative w-full m-auto ">
                            <div class="swiper-wrapper drop-shadow-lg p-2">

                                @foreach ($category->realEstates as $realEstate)
                                    <a href="{{ route('real-estates.index', $realEstate->city_id) }}" class="swiper-slide">
                                        <div class="relative">

                                            <div>

                                                <img class="rounded-md w-full"
                                                    src="{{ optional($realEstate->getFirstMedia('images'))->getUrl() }}"
                                                    alt="Image 2" style="
                                                    height: 280px;">
                                            </div>
                                            <div class="absolute bottom-2 right-0 ">

                                                <p style="text-align: center; font-size: 18px;"
                                                    class="bg-[#ffffffe6] text-[#6f10a2] p-2 rounded-full m-3 ">
                                                    {{ optional($realEstate->city)->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>


                            <!-- Add navigation arrows -->
                            <div id="swiper-button-prev1" class="swiper-button-prev "></div>
                            <div id="swiper-button-next1" class="swiper-button-next "></div>

                        </div>



                    </div>





                    <div class="  flex  justify-around gap-5 flex-col md:flex-row mx-5">
                    </div>
                </div>
            @endforeach







            <div class="fade-in mt-5 bg-[#3A564F] bg-opacity-10 w-full md:p-5">
                <div class="flex justify-around   flex-row-reverse mt-5 p-2 w-4/5 md:1/2 m-auto">

                    <div class="rtl:text-right ltr:text-left flex flex-col items-end gap-3">

                        <h1 class="text-black text-4xl font-semibold">بيع أو أجر عقارك بكل سرعة وسهولة</h1>
                        <p class="text-gray-600 text-lg">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق وصلت
                            لبيع
                            وتأجير العقار بالنيابة عنك بكل سهولة</p>
                        <a href="/pages/add/add.html" class="p-3 md:p-5 text-white bg-[#3A564F] rounded-lg  text-3xl">أضف
                            عقارك
                            هنا</a>

                    </div>

                    <div class="absolute -left-5 top-2 md:static scale-75  md:flex"><svg xmlns="http://www.w3.org/2000/svg"
                            width="208" height="208" fill="none">
                            <path
                                d="M183.719 106.713a43.807 43.807 0 0 0-3.462-2.113v-3.984h20.776a6.928 6.928 0 0 0 4.606-12.09l-21.92-19.605V17.48a6.928 6.928 0 0 0-6.925-6.929h-38.091a6.929 6.929 0 0 0-6.926 6.928v5.058L108.68 1.754a6.923 6.923 0 0 0-9.211 0l-96.96 86.6a6.928 6.928 0 0 0 4.606 12.262h20.777v100.456A6.93 6.93 0 0 0 34.818 208h138.513a6.925 6.925 0 0 0 6.926-6.928v-.485a55.416 55.416 0 0 0 27.705-45.978 55.444 55.444 0 0 0-5.937-27.08 55.414 55.414 0 0 0-18.306-20.816ZM41.744 194.144V93.688a6.93 6.93 0 0 0-6.926-6.928h-9.557l78.813-70.388 30.023 26.811a6.928 6.928 0 0 0 7.411 1.178 6.928 6.928 0 0 0 4.12-6.34V24.409h24.24v47.63a6.93 6.93 0 0 0 2.32 5.162l10.666 9.56h-9.523a6.924 6.924 0 0 0-6.926 6.928v5.196l-.9-.208-1.489-.346-1.662-.312c-.71-.14-1.427-.244-2.147-.311h-.866c-.969 0-1.939-.208-2.943-.278H152.554a55.392 55.392 0 0 0-32.887 10.758 55.419 55.419 0 0 0-20.094 28.178 54.049 54.049 0 0 0-2.424 16.211 55.436 55.436 0 0 0 16.067 39.005 40.757 40.757 0 0 0 1.766 1.697l.935.866H41.744Zm142.495-34.64H159.48v24.802a6.928 6.928 0 0 1-6.926 6.928 6.925 6.925 0 0 1-6.926-6.928v-24.802h-24.793a6.927 6.927 0 0 1 0-13.856h24.793v-24.802a6.93 6.93 0 0 1 6.926-6.928 6.925 6.925 0 0 1 6.926 6.928v24.802h24.759a6.925 6.925 0 0 1 6.925 6.928 6.927 6.927 0 0 1-6.925 6.928Z"
                                fill="#3A564F" fill-opacity=".15" />
                        </svg></div>

                </div>
                <hr>
            </div>
            <!-- ______ -->

            <hr class="fade-in h-2 w-full mt-5">


            <!-- ______ -->
            <div class="fade-in flex justify-around flex-col  md:flex-row-reverse mt-5 p-2 w-[70%] m-auto">

                <div class=" text-center  md:rtl:text-right ltr:text-left flex flex-col items-center md:items-end gap-3">
                    <p class="text-gray-600 text-lg">المزادات</p>
                    <h1 class="text-black text-2xl md:text-4xl font-semibold">شارك في مزاداتنا الالكترونية الخاصة بالعقارات
                    </h1>
                    <a href="/pages/mazadat/mazadat.html"
                        class="p-3 md:p-5 text-white bg-[#3A564F] rounded-lg  md:text-3xl">اكتشف
                        المزادات</a>
                </div>

                <div class="w-full md:w-1/2 mt-2"><img src="{{ asset('website/image/auctionBannerArabicOptimized.eaa6645a.png')}}"
                        alt=""></div>
            </div>


            <hr class="fade-in h-2 w-full mt-5">

            <!-- ______ -->

            <div class=" fade-in flex justify-around flex-col  md:flex-row-reverse mt-5 md:p-2 w-full  gap-5">

                <div
                    class="border flex lg:rounded-lg justify-between items-center bg-white h-40 lg:h-80  relative after:right-0 after:absolute after:top-0 after:bg-[#3A564F] after:w-0 after:h-full after:z-[1] after:transition-all after:duration-300 hover:after:w-full hover:text-white  group wf">
                    <img class="h-full z-[2]" src="{{ asset('website/image/share_req_updated_blur_ar.png')}}" alt="">
                    <div class="rtl:text-right ltr:text-left flex flex-col items-end gap-3 p-3 z-[2]">
                        <h1 class=" lg:text-4xl font-semibold">تدوّر على عقار الأحلام؟</h1>
                        <p class="text-gray-600 group-hover:text-white lg:text-lg"> شارك متطلباتك وتواصل مباشرة مع
                            مسوّقينا.</p>
                        <a href="" class="p-3 lg:p-5 text-white bg-[#3A564F] rounded-lg  lg:text-3xl">اطلب عقارك
                        </a>
                    </div>
                </div>

                <div
                    class="relative border flex lg:rounded-lg justify-between items-center lg:justify-around  h-40 lg:h-80 bg-green-400 bg-opacity-5   after:right-0 after:absolute after:top-0 after:bg-green-400 after:w-0 after:h-full after:z-[1] after:transition-all after:duration-300 hover:after:w-full hover:text-white  group">
                    <img class="h-full z-[2] absolute left-0 bottom-0 lg:static"
                        src="{{ asset('website/image/masterplan_banner_phone_AR.png')}}" alt="">
                    <div class="rtl:text-right ltr:text-left flex flex-col items-end gap-3 p-3 z-[2]">
                        <h1 class=" lg:text-4xl font-semibold">وقف على أرضك من جوالك</h1>
                        <p class="text-gray-600 lg:text-lg group-hover:text-white">اكتشف المخططات والأراضي المتوفرة
                            وأسعارها وابدأ
                            الاستثمار.</p>
                        <a href="" class="p-2 lg:p-5 text-white bg-[#3A564F] rounded-lg  lg:text-2xl">تصفح
                            المخططات</a>
                    </div>
                </div>



            </div>


            <hr class=" h-2 w-full mt-5 ">


            <!-- ______ -->

            <div
                class="fade-in relative bg-[#3A564F] bg-opacity-10 w-full h-96 flex flex-col items-end lg:items-center justify-around overflow-hidden  lg:flex-row mt-5 ">
                <img class=" absolute bottom-0 left-0 md:left-3 h-40  md:static md:h-full "
                    src="{{ asset('website/image/homepageDownloadAppBanner.png') }}" alt="">


                <div class="rtl:text-right ltr:text-left flex flex-col items-end gap-3 p-3">
                    <h1 class="text-4xl font-semibold">حمل تطبيقنا</h1>
                    <p class="text-gray-600 md:text-xl group-hover:text-white ">اضغط على الرابط ادناه لتحميل تطبيق وصلت
                        وتصفح
                        الآلاف
                        من العقارات</p>

                    <div class="flex items-center justify-between gap-5">
                        <div class="w-32 md:w-40 m-auto">
                            <a href=""><img src="https://wasalt.com/images/AppStore.svg" alt=""
                                    class="w-full"></a>
                        </div>
                        <div class="w-32 md:w-40 m-auto">
                            <a href=""><img src="https://wasalt.com/images/PlayStore.svg" alt=""
                                    class="w-full"></a>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-between gap-5">
                        <p class="text-gray-600 text-xl group-hover:text-white ">او امسح رمز الكيو أر (QR) مباشرة</p>
                        <div class="ml-40  md:ml-0 w-28 m-auto p-2 bg-white drop-shadow-md">
                            <img src="https://wasalt.com/images/wasalt_qr_header.svg" alt="" class="w-full">
                        </div>
                    </div>
                </div>

            </div>





    </main>
@endsection
@push('js')
    <script>
        const accordions = document.querySelectorAll('.border-b');

        accordions.forEach(accordion => {
            const button = accordion.querySelector('button');
            const content = accordion.querySelector('div');

            button.addEventListener('click', () => {
                content.classList.toggle('hidden');
                if (content.classList.contains('hidden')) {
                    button.querySelector('span').innerText = '+';
                } else {
                    button.querySelector('span').innerText = '-';
                }
            });
        });
    </script>



    <script>
        setTimeout(() => {
            document.getElementById('loader').classList.add('hidden')
        },1000);




    </script>






    <script src="{{ asset('website/js/carsoul.js') }}"></script>
@endpush
