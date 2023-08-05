<div class="container">
    <div
        class=" bg-white border border-gray-300 w-full justify-around items-center p-5 text-black mt-[130px]  drop-shadow-lg flex flex-wrap-reverse gap-y-3">



        <div class=" flex items-center flex-wrap-reverse justify-center gap-y-3">

            <div class="relative">
                <button onclick="toggleHidden('kind_dropDown')"
                    class="relative group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5  md:rounded-full ">
                    <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500"> النوع <i
                            class="fa-solid fa-angle-down"></i>
                    </h1>
                </button>


                <div id="kind_dropDown"
                    class="absolute right-0 mt-2 py-2  bg-white border border-gray-300 rounded-lg shadow-lg hidden text-right p-1">
                    <h1 class="text-lg">نوع العقار</h1>

                    <div class="flex  flex-wrap lg:flex-nowrap  w-full p-3 gap-4 flex-row-reverse">

                        <button class="border rounded-lg h-20 flex flex-col items-center p-2 focus:border-[#6f10a2]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="apartment">
                                <path
                                    d="M57.625,51.583h-11.25v-3.708H49c3.446,0,6.25-2.804,6.25-6.25c0-2.03-0.973-3.885-2.595-5.048
                                        c0.146-0.384,0.22-0.789,0.22-1.202c0-1.575-1.053-2.918-2.563-3.411v-1.026c0-2.516-2.047-4.563-4.563-4.563
                                        s-4.563,2.047-4.563,4.563v1.026c-0.138,0.045-0.267,0.104-0.396,0.163V18.941l-10.669-8.68l-0.55,0.234
                                        c-0.003,0-0.005,0.001-0.007,0.002l-19.441,8.258v32.828H6.375c-0.553,0-1,0.448-1,1s0.447,1,1,1h3.749h30.667h16.834
                                        c0.553,0,1-0.448,1-1S58.178,51.583,57.625,51.583z M42.275,33.771l0.912-0.08v-2.753c0-1.413,1.149-2.563,2.563-2.563
                                        s2.563,1.149,2.563,2.563v2.753l0.912,0.08c0.941,0.083,1.65,0.772,1.65,1.604c0,0.416-0.188,0.737-0.345,0.934l-0.775,0.971
                                        l1.114,0.55c1.469,0.726,2.381,2.18,2.381,3.795c0,2.343-1.906,4.25-4.25,4.25h-2.625v-3.466l2.019-0.865
                                        c0.508-0.217,0.743-0.805,0.525-1.313c-0.217-0.508-0.809-0.742-1.313-0.525l-1.56,0.668l-0.955-3.629
                                        c-0.141-0.534-0.686-0.851-1.222-0.713c-0.534,0.141-0.853,0.688-0.712,1.222l1.217,4.624v3.997H41.75
                                        c-2.344,0-4.25-1.907-4.25-4.25c0-1.789,1.146-3.393,2.85-3.991l1.184-0.415l-0.668-1.061c-0.159-0.253-0.24-0.516-0.24-0.783
                                        C40.625,34.543,41.334,33.853,42.275,33.771z M28.958,31.206l-16.834,3.911v-3.631l16.834-5.251V31.206z M12.124,37.169
                                        l16.834-3.911v4.24l-16.834,3.054V37.169z M28.958,24.14l-16.834,5.251v-3.798l16.834-5.688V24.14z M12.124,42.585l16.834-3.054
                                        v4.246l-16.834,1.974V42.585z M28.958,12.928v4.872c-0.01,0.003-0.019,0-0.028,0.003l-16.806,5.679v-3.403L28.958,12.928z
                                        M12.124,47.765l16.834-1.974v5.792H12.124V47.765z M30.958,51.583V13.52l7.833,6.373v14.441c-0.104,0.331-0.166,0.679-0.166,1.042
                                        c0,0.27,0.033,0.54,0.1,0.804c-1.964,1.087-3.225,3.164-3.225,5.446c0,2.376,1.334,4.446,3.291,5.503v4.455H30.958z M40.791,47.793
                                         c0.313,0.049,0.632,0.082,0.959,0.082h2.625v3.708h-3.584V47.793z">
                                </path>
                            </svg>
                            <h2>شقة</h2>

                        </button>
                        <button class="border rounded-lg h-20 flex flex-col items-center p-2 focus:border-[#6f10a2]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="apartment">
                                <path
                                    d="M57.625,51.583h-11.25v-3.708H49c3.446,0,6.25-2.804,6.25-6.25c0-2.03-0.973-3.885-2.595-5.048
          c0.146-0.384,0.22-0.789,0.22-1.202c0-1.575-1.053-2.918-2.563-3.411v-1.026c0-2.516-2.047-4.563-4.563-4.563
          s-4.563,2.047-4.563,4.563v1.026c-0.138,0.045-0.267,0.104-0.396,0.163V18.941l-10.669-8.68l-0.55,0.234
          c-0.003,0-0.005,0.001-0.007,0.002l-19.441,8.258v32.828H6.375c-0.553,0-1,0.448-1,1s0.447,1,1,1h3.749h30.667h16.834
          c0.553,0,1-0.448,1-1S58.178,51.583,57.625,51.583z M42.275,33.771l0.912-0.08v-2.753c0-1.413,1.149-2.563,2.563-2.563
          s2.563,1.149,2.563,2.563v2.753l0.912,0.08c0.941,0.083,1.65,0.772,1.65,1.604c0,0.416-0.188,0.737-0.345,0.934l-0.775,0.971
          l1.114,0.55c1.469,0.726,2.381,2.18,2.381,3.795c0,2.343-1.906,4.25-4.25,4.25h-2.625v-3.466l2.019-0.865
          c0.508-0.217,0.743-0.805,0.525-1.313c-0.217-0.508-0.809-0.742-1.313-0.525l-1.56,0.668l-0.955-3.629
          c-0.141-0.534-0.686-0.851-1.222-0.713c-0.534,0.141-0.853,0.688-0.712,1.222l1.217,4.624v3.997H41.75
          c-2.344,0-4.25-1.907-4.25-4.25c0-1.789,1.146-3.393,2.85-3.991l1.184-0.415l-0.668-1.061c-0.159-0.253-0.24-0.516-0.24-0.783
          C40.625,34.543,41.334,33.853,42.275,33.771z M28.958,31.206l-16.834,3.911v-3.631l16.834-5.251V31.206z M12.124,37.169
          l16.834-3.911v4.24l-16.834,3.054V37.169z M28.958,24.14l-16.834,5.251v-3.798l16.834-5.688V24.14z M12.124,42.585l16.834-3.054
          v4.246l-16.834,1.974V42.585z M28.958,12.928v4.872c-0.01,0.003-0.019,0-0.028,0.003l-16.806,5.679v-3.403L28.958,12.928z
           M12.124,47.765l16.834-1.974v5.792H12.124V47.765z M30.958,51.583V13.52l7.833,6.373v14.441c-0.104,0.331-0.166,0.679-0.166,1.042
          c0,0.27,0.033,0.54,0.1,0.804c-1.964,1.087-3.225,3.164-3.225,5.446c0,2.376,1.334,4.446,3.291,5.503v4.455H30.958z M40.791,47.793
          c0.313,0.049,0.632,0.082,0.959,0.082h2.625v3.708h-3.584V47.793z">
                                </path>
                            </svg>
                            <h2>دوبلكس</h2>

                        </button>
                        <button class="border rounded-lg h-20 flex flex-col items-center p-2 focus:border-[#6f10a2]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="apartment">
                                <path
                                    d="M57.625,51.583h-11.25v-3.708H49c3.446,0,6.25-2.804,6.25-6.25c0-2.03-0.973-3.885-2.595-5.048
          c0.146-0.384,0.22-0.789,0.22-1.202c0-1.575-1.053-2.918-2.563-3.411v-1.026c0-2.516-2.047-4.563-4.563-4.563
          s-4.563,2.047-4.563,4.563v1.026c-0.138,0.045-0.267,0.104-0.396,0.163V18.941l-10.669-8.68l-0.55,0.234
          c-0.003,0-0.005,0.001-0.007,0.002l-19.441,8.258v32.828H6.375c-0.553,0-1,0.448-1,1s0.447,1,1,1h3.749h30.667h16.834
          c0.553,0,1-0.448,1-1S58.178,51.583,57.625,51.583z M42.275,33.771l0.912-0.08v-2.753c0-1.413,1.149-2.563,2.563-2.563
          s2.563,1.149,2.563,2.563v2.753l0.912,0.08c0.941,0.083,1.65,0.772,1.65,1.604c0,0.416-0.188,0.737-0.345,0.934l-0.775,0.971
          l1.114,0.55c1.469,0.726,2.381,2.18,2.381,3.795c0,2.343-1.906,4.25-4.25,4.25h-2.625v-3.466l2.019-0.865
          c0.508-0.217,0.743-0.805,0.525-1.313c-0.217-0.508-0.809-0.742-1.313-0.525l-1.56,0.668l-0.955-3.629
          c-0.141-0.534-0.686-0.851-1.222-0.713c-0.534,0.141-0.853,0.688-0.712,1.222l1.217,4.624v3.997H41.75
          c-2.344,0-4.25-1.907-4.25-4.25c0-1.789,1.146-3.393,2.85-3.991l1.184-0.415l-0.668-1.061c-0.159-0.253-0.24-0.516-0.24-0.783
          C40.625,34.543,41.334,33.853,42.275,33.771z M28.958,31.206l-16.834,3.911v-3.631l16.834-5.251V31.206z M12.124,37.169
          l16.834-3.911v4.24l-16.834,3.054V37.169z M28.958,24.14l-16.834,5.251v-3.798l16.834-5.688V24.14z M12.124,42.585l16.834-3.054
          v4.246l-16.834,1.974V42.585z M28.958,12.928v4.872c-0.01,0.003-0.019,0-0.028,0.003l-16.806,5.679v-3.403L28.958,12.928z
           M12.124,47.765l16.834-1.974v5.792H12.124V47.765z M30.958,51.583V13.52l7.833,6.373v14.441c-0.104,0.331-0.166,0.679-0.166,1.042
          c0,0.27,0.033,0.54,0.1,0.804c-1.964,1.087-3.225,3.164-3.225,5.446c0,2.376,1.334,4.446,3.291,5.503v4.455H30.958z M40.791,47.793
          c0.313,0.049,0.632,0.082,0.959,0.082h2.625v3.708h-3.584V47.793z">
                                </path>
                            </svg>
                            <h2>دور</h2>

                        </button>

                    </div>


                    <hr class="w-full ">



                </div>



            </div>



            <div class="relative">
                <button onclick="toggleHidden('rooms_dropDown')"
                    class="relative group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5  md:rounded-full ">
                    <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500"> غرف النوم <i
                            class="fa-solid fa-angle-down"></i></h1>
                </button>

                <div id="rooms_dropDown"
                    class="absolute right-0 mt-2 py-2  bg-white border border-gray-300 rounded-lg shadow-lg hidden text-right  p-1">
                    <h1 class="text-lg">غرف النوم </h1>

                    <div class="flex flex-wrap lg:flex-nowrap w-full p-3 gap-4 flex-row-reverse ">

                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>1</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>2</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>3</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>4</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>5</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>6</h2>
                        </button>
                        <button
                            class="border rounded-lg h-10 flex flex-col items-center p-4 justify-center focus:border-[#3A564F]">
                            <h2>6+</h2>
                        </button>

                    </div>

                </div>







            </div>


            <div class="relative">
                <button onclick="toggleHidden('budget_dropDown')"
                    class="relative group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5  md:rounded-full ">
                    <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500"> الميزانية <i
                            class="fa-solid fa-angle-down"></i></h1>
                </button>


                <div id="budget_dropDown"
                    class="absolute right-0 mt-2 py-2  bg-white border border-gray-300 rounded-lg shadow-lg hidden  p-1">
                    <div class="w-full text-right">
                        <h2>الميزانية ر.س</h2>

                        <div class="flex flex-col md:flex-row">
                            <div class="p-4 w-60">
                                <label for="cities" class="block mb-2 text-xl font-bold">الي</label>
                                <select id="" name="اختار المدينة"
                                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                                    <!-- Add your option elements here -->
                                    <option value="">0</option>
                                    <option value="">5 الف</option>
                                    <option value="">10 الف</option>
                                    <option value="">20 الف</option>
                                    <option value="">30 الف</option>
                                    <option value="">40 الف</option>
                                    <option value="">+40 الف</option>
                                </select>
                            </div>


                            <div class="p-4 w-60">
                                <label for="cities" class="block mb-2 text-xl font-bold">من</label>
                                <select id="" name="اختار المدينة"
                                    class="w-full py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                                    <!-- Add your option elements here -->
                                    <option value="">0</option>
                                    <option value="">5 الف</option>
                                    <option value="">10 الف</option>
                                    <option value="">20 الف</option>
                                    <option value="">30 الف</option>
                                    <option value="">40 الف</option>
                                    <option value="">+40 الف</option>
                                </select>
                            </div>


                        </div>
                    </div>

                </div>
            </div>


            <div class="relative">

                <button onclick="toggleHidden('action_kind_dropDown')"
                    class="relative group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5  md:rounded-full ">
                    <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500"> شراء <i
                            class="fa-solid fa-angle-down"></i>
                    </h1>
                </button>

                <div id="action_kind_dropDown" class="hidden group-focus:flex  absolute top-16 right-2 bg-white">

                    <div class="flex  p-3 gap-4 flex-row-reverse">
                        <div
                            class="group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5 w-32   rounded-md bg-[#6f10a2] bg-opacity-5">
                            <button wire:click="$set('tab', 'buying')"
                                class="flex items-center flex-row-reverse gap-2 text-gray-500 justify-center"> شراء
                            </button>
                        </div>
                        <div
                            class="group focus:border-[#6f10a2] mx-2 border p-1 md:p-3 md:px-5  w-32  rounded-md bg-[#6f10a2] bg-opacity-5">
                            <button wire:click="$set('tab', 'Hire')"
                                class="flex items-center flex-row-reverse gap-2 text-gray-500 justify-center">
                                استئجار
                            </button>
                        </div>


                    </div>

                </div>
            </div>


            <h1 class="text-2xl hidden md:block">|</h1>
            <div class="border rounded-xl p-2 md:w-80 ">
                <input type="text" wire:model.debounce.500ms="search" placeholder="البحث في الحي"
                    class="md:w-4/5 outline-none mx-2 text-right">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>








    </div>


    <div class="sec">
        <div>
            <small>اطلب عقارك</small>
            <h1>تواصل مباشرة مع مسوقين في {{ $city->name }} </h1>
            <p>أكثر من 20 مسوق لديهم عقارات متطابقة مع متطلباتك.</p>
            <button><a href="">اطلب عقارك الان</a></button>

        </div>

        <div><img src="" alt=""></div>
    </div>

    <div class="grid grid-cols-4     m-auto gap-10 md:px-[40px]">

        @foreach ($real_estates as $real_estate)
            <div class=" mt-5 z-[1]  col-span-4 md:col-span-2 lg:col-span-1  m-auto ">
                <a href="{{ route('real-estates.show', $real_estate->id) }}">

                    <div
                        class=" cursor-pointer  relative overflow-hidden rounded-t-md border  drop-shadow-md   rounded-b-lg">

                        <button
                            class=" absolute top-48 right-2 text-white bg-purple-400 text-black p-2 rounded text-xs ">
                            مشروع
                        </button>



                        <img class="w-[532px] md:w-full h-[200px]" src="{{ asset(optional($real_estate->getFirstMedia('images'))->getUrl()) }}"
                            alt="" class="w-full h-60">
                        <div class="flex flex-col items-end text-black bg-[#f6f6de00] border p-5">

                            <!-- <h1 class="flex items-center flex-row-reverse gap-2 text-xl"> 1,345.29 <span class="text-sm text-gray-600">ر.س/متر مربع</span></h1> -->
                            <h1 class="font-semibold text-xl text-purple"> {!! $real_estate->description !!} </h1>
                            <p class="text-gray-600"> {{ optional($real_estate->city)->name }}</p>

                            {{-- <div class="flex items-end  mt-2 gap-5">
                                <div class="flex items-center gap-1">
                                    <h1 class="font-semibold text-xl">3</h1>
                                    <img class="h-8" src="{{ asset($real_estate->getFirstMedia('images')) }}"
                                        alt="">
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


                            </div> --}}

                            <div
                                class="flex items-center justify-between w-full flex-row-reverse mt-5 gap-5 text-right">
                                <div>
                                    <p class="text-lg"> تم تحديثها قبل {{ $real_estate->created_at->format('d') }} أيام
                                    </p>

                                </div>




                            </div>
                            <div class="flex items-center justify-between flex-row-reverse w-full p-3 rounded  mt-6">
                                <h1 style="font-size: 20px;"> {{ $real_estate->min_price }} -
                                    {{ $real_estate->max_price }}

                                </h1>
                                <div class="  p-2  text-[#3A564F] cursor-pointer">
                                    <a href="{{ $real_estate->phone }}">

                                        <i style="font-size: 20px; border: 1px black; background-color: blueviolet; color:  white ; width: 50px; height: 50px; text-align: center; line-height: 2.5; border-radius: 8px;"
                                            class="fa-solid fa-phone">

                                        </i>
                                    </a>
                                    <a href="{{ $real_estate->whatsapp }}">

                                        <i style="font-size: 20px; border: 1px black; background-color: rgb(0, 228, 133); color: white; width: 50px; height: 50px; text-align: center; line-height: 2.5; border-radius: 8px;"
                                            class="fa-brands fa-whatsapp">

                                        </i>
                                    </a>

                                </div>
                            </div>
                        </div>


                        <div class="bg-[#18a8f0] w-full h-3  rounded-b-lg">

                        </div>






                    </div>


                </a>
            </div>
        @endforeach

    </div>
</div>
