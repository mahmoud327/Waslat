@extends('website.layouts.master')
@section('style')
    <style>
        #scroll {
            /* transform: translateY(-100%);
               */
            opacity: 0;
            transition: transform 0.3s ease;
        }

        #scroll.show {
            /* transform: translateY(0);   */
            opacity: 1;
        }

        * {
            scroll-behavior: smooth;
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

        <div class="  md:w-1/2  p-2">
            <div class="flex items-center justify-center gap-3 w-full text-sm">
                <button
                    class=" border bg-white  p-1 px-4 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">الابلاغ
                    عن عقار <i class="fa-solid fa-warning"></i></button>
                <button
                    class=" border bg-white  p-1 px-4 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">مشاركة
                    <i class="fa-solid fa-share"></i></button>
                <button
                    class=" border bg-white  p-1 px-4 rounded-md focus:border-[#510c76] flex items-center whitespace-nowrap">حفظ
                    <i class="fa-solid fa-heart"></i></button>

            </div>

            <div class="border bg-white rounded-md  text-black mt-5 shadow text-right">
                <div class="bg-yellow-400 text-black text-center text-lg rounded-t-md p-3">
                    <h1> يبدأ التسجيل من
                        {{ $auction->start_date }}</h1>

                </div>

                <div class="p-3 text-right flex flex-col items-end">
                    <h2 class="text-gray-500 text-sm">بداية المزاد</h2>
                    <h1 class="text-2xl flex flex-row-reverse items-center gap-2"> {{ $auction->start_price }}<span
                            class="text-gray-500 text-sm">ر.س</span></h1>
                    <p class="text-gray-500 text-sm "> {{ $auction->area }}</p>

                    <div class="flex justify-between  flex-row-reverse text-gray-500">
                        <h1>العمولة (السعي) <span>% {{ $auction->commission }} </span></h1>
                        <p class="flex flex-row-reverse gap-1"> {{ $auction->min_price }} <span>ر.س</span></p>
                    </div>
                    <div class="flex justify-between  flex-row-reverse text-gray-500">
                        <h1> الإجمالي </h1>
                        <p class="flex flex-row-reverse gap-1"> {{ $auction->after_price }} <span>ر.س</span></p>
                    </div>


                    <a href="/pages/login/login.html" class="bg-[#3A564F] w-full p-2 text-white mt-4 rounded-md">تذكير</a>

                    <h1 class="border p-2 w-min  mt-2">مالك</h1>

                    <h1>{{ optional($auction->user)->name }}</h1>

                </div>





            </div>


            <div class="w-full p-2 flex justify-between bg-[#3A564F] text-white mt-5 rounded-md">
                <a href="/pages/login/login.html" class="p-2 border rounded-md">متابعة</a>
                <h1>30 شخص يتابعون المزاد</h1>
            </div>
        </div>


        <div class=" w-full flex flex-col items-end text-black gap-y-4 text-right ">
            <!-- slider -->



            <div id="inline-gallery-container" class="inline-gallery-container">

                @foreach ($auction->getMedia('auctions') as $image)
                    <a href="{{ asset($image->getUrl()) }}"><img src="{{ asset($image->getUrl()) }}" alt=""></a>
                @endforeach

            </div>
            <!-- slider -->


            <div class="mt-5 flex items-center gap-2 " id="addDetails">
                <h1 class="p-2 border rounded">للايجار</h1>
                <h1 class="p-2 border rounded">غير مفروشة</h1>
            </div>

            <div>
                <h1 class="text-3xl font-semibold">{{ $auction->name }}</h1>
                <p class=" text-gray-600">{{ optional($auction->city)->name }}</p>
            </div>
            {{--
            <div class="flex flex-row-reverse flex-wrap gap-8 w-1/2">

                <div class="flex items-center gap-1">
                    <h1 class="font-semibold text-xl">3</h1>
                    <img class="h-8" src="/asset/icons/bed.svg" alt="">
                </div>

                <div class="flex items-center gap-1">
                    <h1 class="font-semibold text-xl">4</h1>
                    <img class="h-8" src="/asset/icons/bathtub.svg" alt="">
                </div>

                <div class="flex items-center gap-1">
                    <h1 class="font-semibold text-xl flex items-center flex-row-reverse gap-1">223<span
                            class="text-sm text-gray-500">م</span></h1>
                    <img class="h-8" src="/asset/icons/meter.svg" alt="">
                </div>

                <div class="flex items-center gap-1">
                    <h1 class="font-semibold text-xl flex items-center flex-row-reverse gap-1">10 <span
                            class="text-sm text-gray-500">سنة</span></h1>
                    <img class="h-8" src="/asset/icons/date.svg" alt="">
                </div>

            </div>
 --}}




            <hr class="w-full ">
            <div id="location">
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


            <div id="details" class="w-full h-80">

                <h1 class="text-3xl font-semibold mb-3">الموقع</h1>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387131.68899103706!2d-74.25986739450048!3d40.69714942235554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a2a3735d893%3A0xd4e119e4713c8eab!2sNew%20York%2C%20NY!5e0!3m2!1sen!2sus!4v1568180855449!5m2!1sen!2sus"
                    width="100%" height="100%" frameborder="0" style="border: 0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>


            <hr class="w-full  mt-12">

            <div class="w-4/5">
                <h1 class="text-3xl font-semibold mb-3">وصف الأصل </h1>

                <div class="flex  w-full  gap-6  justify-between ">
                    <div class="gap-y-4 flex  flex-col ">
                        <h1>
                            {!! $auction->description !!}


                        </h1>
                    </div>

                </div>

            </div>



            <hr class="w-full ">


            <div class="mt-5">
                <h1>تمت الإضافة: منذ 12 يوم
                    الرقم المرجعي للمزاد: 201</h1>


            </div>


            <hr class="w-full ">








            <div class="h-40"></div>

        </div>


    </div>
@endsection
@push('js')
    <script src="{{ asset('website/js/gallery.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/thumbnail/lg-thumbnail.umd.min.js">
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/fullscreen/lg-fullscreen.min.js">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/plugins/zoom/lg-zoom.min.js"></script>

    <script>
        function togglePopUp(popUpId) {
            document.getElementById('popUp').classList.toggle('hidden')
            document.getElementById(popUpId).classList.toggle('hidden')

        }
    </script>
@endpush
