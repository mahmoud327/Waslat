@extends('website.layouts.master')
@section('style')
    <style>
        .wrapper {
            width: 60%;
            position: relative;
            direction: rtl;
            margin: auto;
            margin-top: 100px;
            padding: 50px;
            height: fit-content;
        }

        .wrapper .i {
            top: 50%;
            height: 50px;
            width: 50px;
            cursor: pointer;
            font-size: 1.25rem;
            position: absolute;
            text-align: center;
            line-height: 50px;
            color: rgb(73, 73, 221);
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
            height: 100%;
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

        .inline-gallery-container {
            width: 80%;

            height: 500px;
        }

        .inline-gallery-container img {
            display: none;
        }
    </style>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-fullscreen.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css" />
@endsection
@section('content')
    <div id="top"
        class="  mt-40 w-full p-8 lg:p-0 m-auto  lg:w-4/5 flex flex-col md:flex-row items-center md:items-start gap-y-5 ">


        <div class="  md:w-1/2  p-5">
            <div class="flex items-center justify-center gap-3 flex-wrap-reverse">
                <button
                    class=" border bg-white  p-1 px-6 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">الابلاغ
                    عن عقار <i class="fa-solid fa-warning"></i></button>
                <button
                    class=" border bg-white  p-1 px-6 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">مشاركة
                    <i class="fa-solid fa-share"></i></button>
                <button
                    class=" border bg-white  p-1 px-6 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">حفظ
                    <i class="fa-solid fa-heart"></i></button>

            </div>

            <div class="border bg-white rounded-md p-5 text-black mt-5 shadow text-right">
                <div class="flex items-center  flex-row-reverse gap-2">
                    <h1> {{ $auction->min_price }} </h1><span class="text-gray-500">ر.س/سنة</span>
                </div>
                <div class="flex items-center  flex-row-reverse gap-2">
                    <h1> السعي 2.5%، التأمين </h1><span class="text-gray-500"> 0 ر.س</span>
                </div>
                <div class="mt-5">
                    <h1 class="border p-2 w-min ml-auto">مالك</h1>
                    <p>الرقم المرجعي 424100 | آخر تحديث: منذ 43 يوم</p>
                    <h2>مسوق من قبل سلطان الشهري</h2>
                    <div class="flex gap-3 mt-2 flex-row-reverse">
                        <a href="{{ $auction->phone }}" class="p-2 rounded-lg  bg-[#3A564F] text-white w-full"> اتصال <i
                                class="fa-solid fa-phone"></i></a>
                        <a href="{{ $auction->whatsapp }}"
                            class="p-2 rounded-lg  border border-green-400 hover:bg-green-400 hover:text-white text-green-400  w-full">واتساب
                            <i class="fa-brands fa-whatsapp"></i></a>
                    </div>

                </div>
            </div>
        </div>


        <div class=" w-full flex flex-col items-end text-black gap-y-4 text-right ">
            <!-- slider -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js">
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/fullscreen/lg-fullscreen.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>


            <div id="inline-gallery-container" class="inline-gallery-container">

                @foreach ($auction->getMedia('images') as $image)
                    <a href="{{ asset($image->getUrl()) }}"><img src="{{ asset($image->getUrl()) }}" alt=""></a>
                @endforeach

            </div>

            <div class="w-60 border rounded p-2 bg-gray-100">
                <h1>
                    عدد المشاهدات آخر 7 أيام 52</h1>
            </div>

            <hr class="w-full ">

            <div>
                <h1 class="text-3xl font-semibold mb-3">معلومات الشارع</h1>
                <p>

                </p>
            </div>


            <hr class="w-full ">
            <div class="flex items-end flex-col">
                <h1 class="text-3xl font-semibold mb-3">معلومات إضافية </h1>

                <div class="flex flex-wrap gap-12  justify-end  p-1">

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">نوع العقار</h1>
                        <p class="text-gray-500">سكني</p>
                    </div>

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">كهرباء </h1>
                        <p class="text-gray-500">لا</p>
                    </div>

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">دور العقار </h1>
                        <p class="text-gray-500">1</p>
                    </div>

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">الواجهة</h1>
                        <p class="text-gray-500">شمالية</p>
                    </div>

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">مياه</h1>
                        <p class="text-gray-500">لا</p>
                    </div>

                    <div class="flex gap-6 flex-row-reverse items-center">
                        <h1 class="font-semibold text-lg">عمر العقار</h1>
                        <p class="text-gray-500">1 سنة</p>
                    </div>

                </div>











            </div>


            <hr class="w-full ">

            <div class="w-4/5 flex flex-col items-end">

                <h1 class="text-3xl font-semibold mb-3">الميزات والمرافق </h1>

                <div class="flex  w-full  gap-6  justify-between ">
                    <div class="gap-y-4 flex  flex-col ">
                        <h1>حوش</h1>
                        <h1>ملحق</h1>
                    </div>

                    <div class=" flex  flex-col gap-y-4">

                        <h1>سطح</h1>
                        <h1>مدخلين منفصلين</h1>
                    </div>

                </div>

            </div>


            <hr class="w-full ">

            <div>
                <h1 class="text-3xl font-semibold mb-3">والتجهيزات</h1>

                <div class="flex  w-full  gap-6  justify-between ">
                    <div class="gap-y-4 flex  flex-col ">
                        <h1> أرضيات سيراميك</h1>

                    </div>


                </div>

            </div>


            <hr class="w-full ">

            <div class="flex flex-col items-end">

                <h1 class="text-3xl font-semibold mb-3">وصف العقار</h1>
                <p>شقة عوائل غير مفروشة للتأجير في حي الخليج٬ جدة

                    مسطحات البناء 189 م²</p>

                <a href="" class="text-[#3A564F]">عرض لمزيد</a>

            </div>



            <hr class="w-full ">
            <div class="w-full h-80  flex flex-col items-end">

                <h1 class="text-3xl font-semibold mb-3">الموقع</h1>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387131.68899103706!2d-74.25986739450048!3d40.69714942235554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a2a3735d893%3A0xd4e119e4713c8eab!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1568180855449!5m2!1sen!2sus"
                    width="100%" height="100%" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>



            <hr class="w-full  mt-10">

            <div class="mt-5">
                <h1 class="text-xl text-gray-500">حالة توثيق العقار من الجهات المختصة</h1>
                <button class="bg-yellow-400 border border-yellow-800 bg-opacity-10 p-2  text-gray-600 rounded">العقار مرهون
                    <i class="fa-solid  fa-warning"></i></button>
            </div>


            <hr class="w-full ">


            <div
                class="border flex md:rounded-lg justify-between items-center bg-white w-full  flex-col md:flex-row   relative after:right-0 after:absolute after:top-0 after:bg-[#3A564F] after:w-0 after:h-full after:z-[1] after:transition-all after:duration-300 hover:after:w-full hover:text-white  group">
                <img class="h-full z-[2]" src="/asset/cards/share_req_updated_blur_ar.png" alt="">
                <div class="text-right flex flex-col items-end gap-3 p-3 z-[2]">
                    <h1 class=" md:text-2xl font-semibold">تواصل مباشرة مع مسوقين في جدة</h1>
                    <p class="text-gray-600 group-hover:text-white md:text-lg">أكثر من 20 مسوق لديهم عقارات متطابقة مع
                        متطلباتك.</p>
                    <a href="/pages/talab_akar/talab_akar.html"
                        class="p-3 text-white bg-[#3A564F] rounded-lg  md:text-xl">اطلب عقارك </a>
                </div>
            </div>







            <div class="h-40"></div>

        </div>


    </div>
    <hr class="w-full ">

    @if (count($real_estates))
        <div class="flex items-end flex-col p-8  ">
            <h1 class="text-3xl text-black">عقارات مشابهة</h1>

            <div class="wrapper ">
                <i id="left" class="i fa-solid fa-angle-left"></i>
                <ul class="carousel  overflow-y-hidden">

                    @foreach ($real_estates as $real_estate)
                        <li class="card h-80 bg-white relative rounded-md drop-shadow-lg bg-white mb-5">
                            <a href="{{ route('real-estates.show', $real_estate->id) }}">
                                <img src="{{ optional($real_estate->getFirstMedia('images'))->getUrl() }}" alt=""
                                    class="rounded-t-md h-44 w-full">
                            </a>
                            <button class=" absolute top-2 right-2 text-white bg-yellow-400 text-black p-1 rounded "> مميز
                                <i class="fa-regular fa-star"></i></button>
                            <button class=" absolute top-32 right-2 text-white bg-purple-400 text-black p-1 rounded ">
                                مشروع</button>

                            <h1 class="font-semibold text-lg text-purple"> {!! $real_estate->description !!} </h1>
                            <p class="text-gray-600"> {{ optional($real_estate->city)->name }}</p>

                            <div class="flex items-end  mt-2 gap-5 text-sm">
                                <div class="flex items-center gap-1">
                                    <h1 class="font-semibold text-xl">3</h1>
                                    <img class="h-8" src="" alt="">
                                </div>

                                <div class="flex items-center gap-1">
                                    <h1 class="font-semibold text-xl">4</h1>
                                    <img class="h-8" src="" alt="">
                                </div>

                                <div class="flex items-center gap-1">
                                    <h1 class="font-semibold text-xl flex items-center flex-row-reverse gap-1">223<span
                                            class="text-sm text-gray-500">م</span></h1>
                                    <img class="h-8" src="" alt="">
                                </div>
                            </div>

                            <div class="flex items-center justify-between flex-row-reverse w-full p-3 rounded  ">
                                <h1> {{ $real_estate->start_price }} - {{ $real_estate->end_price }}</h1>
                                <div class="  p-2  text-[#6f10a2] cursor-pointer">
                                    <a href="{{ $real_estate->phone }}"><i class="fa-solid fa-phone m-2 "></i></a>
                                    <a href="{{ $real_estate->whatsapp }} }}"> <i class="fa-brands fa-whatsapp"></i>
                                </div></a>
                            </div>
                        </li>
                    @endforeach



                </ul>
                <i id="right" class="i fa-solid fa-angle-right"></i>
            </div>

        </div>
    @endif
@endsection
@push('js')
    <script src="{{ asset('website/js/gallery.js') }}"></script>

    <script>
        function togglePopUp(popUpId) {
            document.getElementById('popUp').classList.toggle('hidden')
            document.getElementById(popUpId).classList.toggle('hidden')

        }
    </script>
@endpush
