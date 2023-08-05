<div>


    <div
        class="border border-gray-300 w-full justify-around items-center p-5 text-black mt-[130px] bg-white drop-shadow-lg flex flex-wrap-reverse  gap-y-2  z-[99]">

        <button class="relative group border p-2 rounded-md shadow cursor-pointer  ">
            <h1><i class="fa-solid fa-ellipsis-v"></i> قائمة المزاد</h1>

            <div
                class="absolute  hidden group-focus:flex left-0 p-3 top-20 bg-white   flex-col gap-y-2 w-52 text-gray-500 rounded-md shadow shadow-[#3A564F] after:bottom-0 after:right-0 after:w-full after:h-1 after:absolute  after:rounded-b-md after:bg-[#3A564F]  z-10">
                <div class="flex items-center   justify-end gap-2  hover:bg-[#3A564F] hover:text-white p-2"
                    onclick="togglePopUp('contact_us_popUp')"> تواصل معنا <i class="fa-solid fa-phone"></i></div>
                <hr>
                <div class="flex items-center   justify-end gap-2  hover:bg-[#3A564F] hover:text-white p-2"
                    onclick="togglePopUp('how_it_work_popUp')"> كيف يعمل المزاد <i class="fa-solid fa-info-circle"></i>
                </div>
                <hr>
                <div class="flex items-center   justify-end gap-2  hover:bg-[#3A564F] hover:text-white p-2"
                    onclick="togglePopUp('elshrot_popUp')"> الشروط و الاحكام <i class="fa-solid fa-film"></i></div>
            </div>

        </button>

        <div class="flex items-center justify-center gap-2 gap-y-3 flex-wrap-reverse">

            <button onclick="togglePopUp('kind_of_saller_popUp')"
                class="relative  focus:border-[#3A564F] mx-2 border p-1 md:p-3 md:rounded-full">
                <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500">نوع البائع <i
                        class="fa-solid fa-angle-down"></i></h1>

            </button>

            <button onclick="togglePopUp('kind_of_mazad_popUp')"
                class="group focus:border-[#3A564F] mx-2 border p-1 md:p-3 md:rounded-full">
                <h1 class="flex items-center flex-row-reverse gap-2 text-gray-500">حالة المزاد<i
                        class="fa-solid fa-angle-down"></i></h1>
            </button>


            <h1 class="text-2xl hidden md:block">|</h1>
            <div class="border rounded-xl p-2 md:w-80 flex items-center ">
                <input type="text" wire:model.debounce.500ms="search" placeholder="البحث في المدينة"
                    class="md:w-4/5 outline-none md:mx-2 text-right">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>

        </div>

    </div>


    <div class="grid grid-cols-12 justify-center lg:justify-end md:w-4/5 mt-5  m-auto gap-5  ">
        @foreach ($auctions as $auction)
            <a href="{{ route('auctions.show', $auction->id) }}" class="col-span-12  md:col-span-6  lg:col-span-4">
                <div
                    class="relative overflow-hidden rounded-t-md border bg-green-400  drop-shadow-md   rounded-b-lg z-[-1] ">

                    <button class="absolute top-2 left-2 text-white focus:text-red-400 text-xl"><i
                            class="fa-solid fa-heart"></i></button>
                    <button class=" absolute top-2 right-2 text-white bg-yellow-400 text-black p-2 rounded ">
                        {{ $auction->getStartDate() }} <i class="fa-solid fa-clock"></i></button>

                    <img src="{{ asset('storage/' . $auction->image) }}" alt="" class="w-full h-60">

                    <div class="flex flex-col items-end text-black bg-white border p-5">

                        <h1 class="flex items-center flex-row-reverse gap-2 text-xl"> {{ $auction->area }} <span
                                class="text-sm text-gray-600"></span></h1>
                        <h1 class="font-semibold text-xl">{{ $auction->name }}</h1>
                        <p class="text-gray-600">{{ optional($auction->city)->name }}</p>

                        <div class="flex items-end  mt-2 gap-5">
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

                            <div class="flex items-center gap-1">
                                <h1 class="font-semibold text-xl flex items-center flex-row-reverse gap-1">10 <span
                                        class="text-sm text-gray-500">سنة</span></h1>
                                <img class="h-8" src="" alt="">
                            </div>
                        </div>

                        <div class="flex items-center justify-between w-full flex-row-reverse mt-5 gap-5 text-right">
                            <div>
                                <p class="text-lg">بداية المزاد</p>
                                <h1 class="font-semibold text-xl flex items-center flex-row-reverse gap-1">
                                    {{ $auction->start_price }} <span class="text-sm text-gray-500">ر.س</span></h1>
                            </div>

                            <div>
                                <p class="text-lg"> يبدأ المزاد خلال</p>
                                <h1 class="font-semibold text-xl ">{{ $auction->start_date }} </h1>
                            </div>


                        </div>

                        <div
                            class="flex items-center justify-between flex-row-reverse w-full p-3 rounded bg-[#3A564F] bg-opacity-10 mt-6">
                            <h1>25 شخص يتابعون المزاد</h1>
                            <div class="border border-[#3A564F]  p-2 rounded bg-white text-[#3A564F] cursor-pointer">
                                متابعة
                                <i class="fa-solid fa-bell"></i>
                            </div>
                        </div>
                    </div>


                    <div class="bg-[#3A564F] w-full h-8  rounded-b-lg">

                    </div>






                </div>
            </a>
        @endforeach

    </div>






    <!-- pop ups -->
    <div id="popUp" class=" hidden w-full h-full bg-black bg-opacity-20 z-40  absolute top-0 left-0">

        <div id="contact_us_popUp"
            class=" hidden relative w-[600px] m-auto bg-white h-80 mt-80 rounded-xl flex items-center  justify-between">
            <i class="fa-solid fa-xmark-circle text-2xl absolute top-2 left-2 cursor-pointer"
                onclick="togglePopUp('contact_us_popUp')"></i>

            <img src="" alt="" class="w-60">

            <div class="flex flex-col text-right items-end p-5">
                <h1 class="text-black text-2xl  -translate-y-5">تواصل معنا</h1>
                <p class="md:text-lg">تواصل معنا لأي استفسار متعلّق بالمزادات أو المحفظة الإلكترونية</p>
                <div class="flex gap-3 mt-2 flex-row-reverse">
                    <a href="" class="p-2 rounded-lg  bg-[#3A564F] text-white"> اتصال <i
                            class="fa-solid fa-phone"></i></a>
                    <a href=""
                        class="p-2 rounded-lg  border border-green-400 hover:bg-green-400 hover:text-white text-green-400 ">واتساب
                        <i class="fa-brands fa-whatsapp"></i></a>
                </div>

                <div class="mt-5">
                    <h1 class="text-gray-500 text-lg">للاستفسارات الأخرى</h1>
                    <h1>+2057822158 <i class="fa-solid fa-phone"></i></h1>
                </div>
            </div>


        </div>

        <div id="how_it_work_popUp"
            class="hidden relative w-[600px] m-auto bg-white h-80 mt-80 rounded-xl flex flex-col items-end p-5 text-black">
            <i class="fa-solid fa-xmark-circle text-2xl absolute top-2 left-2 cursor-pointer"
                onclick="togglePopUp('how_it_work_popUp')"></i>
            <h1 class="text-black text-3xl">كيف يعمل المزاد</h1>

            <div class="flex items-center gap-3 mt-5">
                <h1 class="text-xl">سجّل في المزاد</h1>
                <div class="p-2 bg-[#3A564F] bg-opacity-10 rounded-full"><img
                        src="" alt=""></div>
            </div>
            <div class="flex items-center gap-3 mt-5">
                <h1 class="text-xl"> أنشأ محفظة إلكترونية وأضف عربون</h1>
                <div class="p-2 bg-[#3A564F] bg-opacity-10 rounded-full"><img
                        src="" alt=""></div>
            </div>
            <div class="flex items-center gap-3 mt-5">
                <h1 class="text-xl"> زايد لتكسب أصول قيّمة </h1>
                <div class="p-2 bg-[#3A564F] bg-opacity-10 rounded-full"><img
                        src="" alt=""></div>
            </div>

        </div>

        <div id="elshrot_popUp"
            class=" hidden relative w-[600px] m-auto bg-white h-[620px] mt-60 rounded-xl flex flex-col items-end p-5 text-black">

            <i class="fa-solid fa-xmark-circle text-2xl absolute top-2 left-2 cursor-pointer "
                onclick="togglePopUp('elshrot_popUp')"></i>
            <h1 class="text-3xl ">الشروط والأحكام</h1>

            <div class="overflow-y-scroll text-right">
                <div class="styles_text_physical__Ail96"> <span lang="ar">وثيقة عقد أحكام وشروط استخدام منصة مزاد
                        وصلت لبيع
                        العقارات الالكتروني
                        شركة وصلت للخدمات العقارية</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">فيما يلي وثيقة عقد الأحكام والشروط (ويشار لها بـ"الأحكام والشروط")
                                بين
                                شركة وصلت
                                للخدمات العقارية، سجل تجاري رقم (1010635634) وعنوانها (الرياض، حي الوزارات، طريق الملك
                                عبدالعزيز) (ويشار
                                لها بـ "الشركة") و"المزايد" أو "المستخدم" كما هو معرف أدناه.</span></div>
                    </div> <span lang="ar">المادة الأولى: التعريفات</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">ما لم يقتض السياق خلاف ذلك، يكون للعبارات المعرفة أدناه المعاني
                                المبينة
                                مقابل كل
                                منها:</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">الموقع الالكتروني" أو "مزاد وصلت" منصة الكترونية تقدم عن طريقها
                                الشركة
                                خدمة المزايدة
                                والبيع العلني للعقارات عن طريق الموقع الالكتروني على عنوان الشبكة العنكبوتية
                                www.wasalt.com
                                وذلك من خلال
                                إتاحة الفرصة للمزايد المزايدة على شراء وحدات عقارية يتم عرضها على الموقع الالكتروني من
                                قبل
                                مالك
                                العقار.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"المزاد" بيع علني يتم على الموقع الالكتروني من خلال مزايدة المزايد
                                على
                                الأسعار من أجل
                                شراء وحدات عقارية معروضة على الموقع الالكتروني من قبل مالك العقار.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"الوحدة أو الوحدات العقارية" هي الأرض أو المبنى سواء كانت مخصصة
                                للاستخدام
                                السكني أو
                                التجاري والتي يعرضها مالك العقار للمزايدة في الموقع الالكتروني.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"مالك العقار" أو "البائع" من يمتلك الوحدة العقارية وله الحق التصرف
                                فيها
                                أو من هو مفوض
                                بالتصرف في عقار الغير بموجب وكالة سارية.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"المزايد" أو "المستخدم" هو الشخص الطبيعي أو الاعتباري الذي أكد رغبته
                                بدخول المزاد طبقاً
                                لبنود هذه الاحكام والشروط.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"الأحكام والشروط" أو "الوثيقة" أو "العقد" وثيقة عقد الأحكام والشروط
                                هذه.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"فترة العرض" تحمل المعنى المحدد في الفقرة (أ) من المادة
                                الخامسة.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"السعر الأدنى" هو الحد الأدنى لسعر الوحدة العقارية التي يتم عرضها
                                والذي
                                تتفق الشركة
                                ومالك العقار عليه.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"عربون المزايد" تحمل المعنى المحدد في الفقرة (ج) من المادة
                                الخامسة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"فترة المزايدة" تحمل المعنى المحدد في الفقرة (د) من المادة
                                الخامسة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"فترة الاتمام" تحمل المعنى المحدد في الفقرة (و) من المادة
                                الخامسة.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"عربون مالك العقار" هو العربون الذي يتم تحديده من قبل الشركة ويدفعه
                                مالك
                                العقار نظير
                                عرض عقاره على منصة وصلت.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"رسوم خدمات الشركة" تحمل المعنى المحدد في الفقرة (ى) من المادة
                                الخامسة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">"وقت سريان الوثيقة" هو تاريخ قبول المستخدم لهذه الوثيق.</span></div>
                    </div> <span lang="ar">المادة الثانية: الأهلية والالتزام بالشروط والأحكام</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تمثل هذه الأحكام والشروط عقداً ملزماً بين الشركة والمستخدم وتحدد
                                مسؤوليات
                                الطرفين وعلى
                                المستخدم قراءة هذه الأحكام والشروط بعناية قبل استخدام خدمات مزاد وصلت ويتحقق علم
                                المستخدم
                                بهذه الشروط
                                والأحكام علماً نافياً للجهالة وموافقته على الالتزام بها وإقراره بأهليته للدخول في هذا
                                الالتزام من وقت
                                قيامه بالنقر على أيقونة "أقر بأنني بكامل الأهلية وأنني قرأت الشروط والأحكام وأوافق على
                                الالتزام بما جاء
                                فيها" وعندها تسري أحكام الوثيقة تجاهه ويعتبر هو "وقت سريان الوثيقة"</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">كما يقر المستخدم ويوافق بهذا على أن للشركة صلاحية تعديل هذه الشروط
                                والأحكام دون الحاجة
                                لأخذ موافقته المسبقة أو اشعاره بشكل فردي وذلك من خلال نشر التعديلات على الموقع
                                الالكتروني
                                واستمرار
                                المستخدم باستخدام الموقع بعد تاريخ نشر تلك التعديلات ويقر المستخدم أن تلك التعديلات تمثل
                                جزء
                                من هذه
                                الشروط والأحكام وأنه يقر ويوافق على الالتزام بها.</span></div>
                    </div> <span lang="ar">المادة الثالثة: الغرض من منصة مزاد وصلت</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">قامت الشركة بتأسيس الموقع الالكتروني، مزاد وصلت، وذلك لغرض قيام ملاك
                                العقارات بعرض
                                وحداتهم العقارية على الموقع الالكتروني بغرض المزايدة على أسعار شرائها من قبل المزايدين
                                وتقوم
                                الشركة بدور
                                الوسيط بينهم وبين الملاك وذلك لغرض عرض العقارات وتحديد السعر الأدنى لقيمها والوساطة في
                                إتمام
                                بيعها وذلك
                                مقابل السعر الذي يصل له المزاد في حال وصل سعر المزايدة إلى أو تخطت السعر الأدنى وتحدد
                                هذه
                                الشروط
                                والأحكام الالتزامات والإجراءات المتعلقة بذلك.</span></div>
                    </div> <span lang="ar">المادة الرابعة: اشتراطات التسجيل والإقرارات والالتزامات
                        المستمرة</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتوجب على كل شخص طبيعي أو معنوي يرغب في الدخول في المزاد أن يقوم
                                بإنشاء
                                حساب مستخدم على
                                الموقع الالكتروني والالتزام بمتطلبات وشروط انشاء حساب المستخدم التالية:</span></div>
                    </div> <span lang="ar">اشتراطات تسجيل الأشخاص الطبيعيين</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">أن يكون يبلغ من العمر 18 عاماً على الأقل وأن يقر بأن له كامل الأهلية
                                الشرعية التي تجيز
                                له قبول والالتزام بهذه الشروط والأحكام.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">أن يكون سعودي الجنسية أو أن يكون غير سعودي ولكن من الذين يسمح لهم
                                نظاماً
                                بتملك العقار
                                في المملكة العربية السعودية وتقديم ما يثبت ذلك.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">أن يقدم ما يثبت هويته وعنوانه وأرقام التواصل معه وأي معلومات اثباتية
                                أخرى
                                تحددها
                                الشركة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">ألا يكون ممثلاً لجهة أو شخص أخر أو يستخدم الموقع بالإنابة عن آخرين
                                إلا في
                                حال كان
                                وكيلاً لشخص آخر يجوز له بموجب وكالة شرعية التسجيل على الموقع وقبول الشروط والأحكام
                                وإتمام
                                التصرفات
                                العقارية نيابة عن الموكل وتقديم ما يثب ذلك.</span></div>
                    </div> <span lang="ar">اشتراطات تسجيل الأشخاص المعنويين (الشركات أو المؤسسات)</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">أن تكون الشركة مملوكة بالكامل لأشخاص سعوديين أو في حال شركة مختلطة أن
                                تكون مرخصة من قبل
                                الجهة المختصة بتملك العقار في المملكة العربية السعودية.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تقديم نسخة من السجل التجاري الساري.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تقديم نسخة من النظام الأساسي أو عقد التأسيس حسب ما ينطبق.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تقديم ما يثبت صلاحية المتصرف بالتسجيل بالتصرف نيابة عن الشركة في قبول
                                والالتزام
                                بالأحكام والشروط.</span></div>
                    </div> <span lang="ar">الإقرارات والالتزامات المستمرة</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يقر المستخدم بأنه على علم ودراية بالأنظمة المتعلقة بتملك العقار بما
                                في
                                ذلك ما يتعلق
                                بتملك الأجانب والتملك في مكة المكرمة والمدينة المنورة وانطباق تلك الأنظمة وجميع الأنظمة
                                الأخرى اللازمة
                                عليه لاستخدامه للموقع طبقاً للشروط والأحكام.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يقر ويتعهد بأن جميع المعلومات المقدمة من قبله صحيحة ودقيقة وغير
                                مضللة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يقر ويتعهد المستخدم بعدم القيام بمنح حسابه لاستخدام الآخرين.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتعهد المستخدم بعدم استخدام أي شخصية طبيعية أو معنوية أخرى للمزايدة
                                باسمها.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتعهد المستخدم بعدم استخدام أي عمليات آلية لمعالجة، أو مراقبة، أو
                                نسخ، أو
                                استخراج أي
                                صفحات موجودة على الموقع الالكتروني أو أي معلومات أو بيانات يحتويها أو يتم الوصول إليها
                                عن
                                طرق الموقع
                                الالكتروني أو المواد أو البيانات التي يتم الوصول إليها عن طريق أو التي يكون مصدرها طرف
                                ثالث.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتعهد المستخدم بعدم القيام بأي عملية آلية للتدخل في أو محاولة التدخل
                                في
                                طريقة العمل
                                السليمة للموقع الالكتروني أو القيام بأي فعل يكون من شأنه فرض حمل كبير بشكل غير منطقي أو
                                غير
                                متناسب مع
                                البنية التحتية المتاحة.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتعهد المستخدم بعدم القيام بهندسة عكسية، أو جمع عكسي، أو تفكيك، أو
                                عمل
                                أخر من شأنه
                                اكتشاف الصيغ الحسابية أو المعالجات فيما يخص برنامج الحاسوب المستخدم في البنية التحتية
                                والعمليات المتعلقة
                                بالموقع الالكتروني. كما يتعهد المستخدم بعدم نسخ، أو إعادة إنتاج/أو تغيير، أو تعديل، او
                                اشتقاق أعمال من،
                                أو إقامة عرض عام لأي جزء من محتوى الموقع الإلكتروني دون الموافقة الخطية المسبقة من
                                الشركة.
                            </span></div>
                    </div> <span lang="ar">المسؤوليات الناتجة عن الإخلال بالإقرارات والإلتزامات</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">لا تتحمل الشركة أي مسؤولية تتعلق بمخالفة أو إخلال المستخدم لأي من
                                تعهداته
                                وإقراراته في
                                هذه الوثيقة ويحق للشركة إلغاء تسجيل المستخدم ومصادرة جميع الرسوم أو الإيداعات أو العربون
                                التي يودعها
                                المستخدم ويقر ويتعهد المستخدم بقيامه بتعويض الشركة عن التكاليف التي تكبدتها والدفاع عنها
                                عن
                                أي خسارة قد
                                تلحق بها.</span></div>
                    </div> <span lang="ar">المادة الخامسة: أحكام استخدام المنصة</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تقوم الشركة بعرض العقارات المعدة للمزايدة في الموقع الالكتروني وتتاح
                                الفرصة للمعاينة من
                                خلال التنسيق مباشرة مع مالك العقار وتستمر فترة العرض لكل عقار على حسب المدة المتفق عليها
                                بين
                                الطرفين، من
                                عرضها الأول على الموقع الالكتروني (ويشار لها بـ "فترة العرض").</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تقوم الشركة بإشعار المستخدمين الذين يوافقون على استلام إشعارات من
                                خلال
                                حساباتهم بوجود
                                عقار جديد يتم عرضه.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال رغب المستخدم بدخول المزايدة على الوحدة العقارية، فعليه إيداع
                                مبلغ
                                العربون المحدد
                                للعقار في الإعلان على الموقع (ويشار له بـ "عربون المزايد").</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال لم يسحب مالك العقار عقاره خلال فترة العرض، فيحق للمستخدم الذي
                                دفع
                                عربون المزايد
                                دخول المزايدة والتي تستمر من اليوم التالي لانتهاء فترة العرض ولمدة محددة يتفق عليها
                                الطرفين
                                (ويشار لها
                                بـ "فترة المزايدة").</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال سحب مالك العقار عقاره قبل انتهاء فترة المزايدة فترد قيمة
                                العربون
                                للمستخدم.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال كان عرض المستخدم هو العرض الأعلى بتاريخ انتهاء فترة المزايدة
                                شريطة
                                أن يساوي أو
                                يتجاوز ذلك السعر الأدنى، فيتم إرساء المزايدة على عرضه ويتم إخطاره بذلك وعليه التنسيق
                                المباشر
                                مع مالك
                                العقار لإتمام البيع وتوثيقه ونقل الملكية من خلال الجهات المختصة في خلال فترة لا تتجاوز
                                سبعة
                                أيام من
                                تاريخ إشعاره (ويشار لها بـ "فترة الاتمام").</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال انسحب المستخدم صاحب العرض الفائز ولم يقم بإتمام البيع فيحق
                                للشركة
                                مصادرة عربون
                                المزايد الذي قام بدفعه وإلغاء حسابه وحضره ويتم الانتقال إلى صاحب العرض الذي يليه في
                                القيمة
                                شريطة أن
                                يساوي ذلك أو يتجاوز السعر الأدنى وعليه التنسيق المباشر مع مالك العقار لإتمام البيع خلال
                                فترة
                                لا تتجاوز
                                سبعة أيام من تاريخ إشعاره (ويشار لها ب"فترة الاتمام الثانية").</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال إنسحب صاحب العرض المشار إليه في الفقرة السابقة فيتم إلغاء
                                المزايدة
                                ومصادرة عربون
                                المزايد المدفوع من قبله وحضره.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يقر المستخدم ويوافق على أن الشركة لا تضمن إتمام بيع الوحدات العقارية
                                ولا
                                تتحمل أي
                                مسؤولية فيما يخص إخلال مالك العقار أو انسحابه.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تتقاضى الشركة رسوم خدمات بقيمة 2.5% كحد اقصى (ويشار لها بـ "رسوم
                                خدمات
                                الشركة") من
                                السعر النهائي للعقار يتحملها المستخدم صاحب العرض الفائز على أن تخصم مباشرة من عربون
                                المزايد
                                وعربون مالك
                                العقار، ويتم إعادة المتبقي لكل منهما بعد إتمام البيع أو الرجوع عليهما بأي نقص بالتضامن
                                بينهما.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يكون المستخدم صاحب العرض الفائز ومالك العقار مسؤولين بالتضامن عن أي
                                رسوم
                                أو ضرائب
                                حكومية ناتجة عن إتمام صفقة البيع ولا تتحمل الشركة أي منها وفي حال تم تحميل هذه المبالغ
                                على
                                الشركة لأي
                                سبب كان فيحق لها الرجوع عليهما بالتضامن.</span></div>
                    </div> <span lang="ar">المادة السادسة: دفع الرسوم</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتم دفع أي مبالغ مستحقة من المستخدم عن طريق البطاقة الائتمانية او
                                بطاقة
                                مدى على الموقع
                                الالكتروني مباشرة.</span></div>
                    </div> <span lang="ar">المادة السابعة: معاينة العقار</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يقر المستخدم بأنه أتيحت له معاينة العقار وأن دفعه عربون المزايد يعد
                                إقراراً منه بذلك لا
                                يحق له العودة عنه. ولا يحق للمستخدم الرجوع على الشركة للمطالبة بأضرار أي عيوب في الوحدة
                                العقارية ولا
                                تقدم الشركة أي ضمانات أو تعهدات او التزامات بهذا الخصوص. </span></div>
                    </div> <span lang="ar">المادة الثامنة: المسؤولية القانونية والتعويض</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">لا تتحمل الشركة أي مسؤولية تنشأ عن الاستخدام غير المصرح به لحساب
                                المستخدم
                                الخاص به أو
                                أي أضرار تنتج عن اختراق الموقع غير المشروع من طرف ثالث، ويوافق المستخدم في حال شك في أن
                                أي
                                طرف غير مصرح
                                له يستخدم حساب المستخدم أو شك في أي خرق للأمن، ينبغي عليه إخطار الشركة على الفور.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يوافق المستخدم ويقر بتعويض الشركة وأي جهات مرتبطة بها وموظفيها
                                ومديريها
                                والعاملين لدى
                                الشركة أو لدى الجهات المتربطة وبشكل فوري وعند الطلب، عن كافة المطالبات، والالتزامات،
                                والخسائر،
                                والتكاليف، بما في ذلك التكاليف القانونية الناشئة عن أي خرق أو مخالفة لهذه الشروط
                                والأحكام من
                                قبل
                                المستخدم أو غيرها من الأضرار عن استخدام المستخدم للموقع الإلكتروني.</span></div>
                    </div> <span lang="ar">المادة التاسعة: الملكية الفكرية</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">إن حقوق النشر وكافة حقوق الملكية الفكرية الأخرى في كافة المواد
                                والمحتوى
                                الذي يتم توفيره
                                كجزء من الموقع الالكتروني ملك للشركة أو مانحي الرخصة المتعلقة بها في كافة الأوقات ويجوز
                                للمستخدم استخدام
                                هذه المواد والمحتوى فقط على النحو المصرح به خطياً من قبل الشركة أو من قبل مانحي الرخصة،
                                ويوافق المستخدم
                                على عدم القيام بمساعدة أو تسهيل عمل الغير على نسخ المادة أو المحتوى أو إعادة انتاجه ،أو
                                بثه،
                                أو توزيعه،
                                أو تكييفه، أو استخدامه على نحو تجاري، أو إيجاد أعمال مبنية عليها وإذا علم المستخدم بوجود
                                توزيع أو
                                استغلال تجاري من أي نوع فيوافق المستخدم على إعلام الشركة بذلك على الفور.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">من خلال تقديمه أي بيانات أو محتوى في الموقع الالكتروني، يمنح المستخدم
                                الشركة ترخيصا غير
                                حصري، ومجاني، ودائم، وغير قابل للتحويل، وعالمي، وغير قابل للنقض، وقابل للترخيص الفرعي
                                وذلك
                                للأغراض
                                التالية:</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">استخدامها، وإعادة إنتاجها، وتعديلها، وتكييفها، وترجمتها، وتوزيعها،
                                ونشرها، ونسخها،
                                وبثها وتوصيلها بأي شكل من الأشكال، وفي أعمال مقتبسة منها لعرضها أو أدائها أمام جمهور في
                                أي
                                مكان في
                                العالم ومن خلال أي وسيلة إعلامية، معروفة الآن أو يتم ابتداعها مستقبلا، و</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">استخدام الاسم الذي قام بتقديمه بالترابط مع المحتوى.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">ويمنح المستخدم الشركة تفويضاً غير قابل للنقض للملاحقة القانونية لأي
                                شخص
                                حقيقي أو
                                اعتباري يخل بحقوق المستخدم في هذا المحتوى.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يتعهد ويوافق المستخدم بالقيام بجميع ما يلزم حسب ما تطلبه الشركة
                                لتمكين
                                الشركة من
                                الاستفادة من الحقوق الممنوحة للشركة طبقاً لهذه الشروط والأحكام.</span></div>
                    </div> <span lang="ar">المادة العاشرة: مدة الاتفاقية والتنازل والإنهاء</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تستمر الشروط والأحكام بالانطباق طالما استمر استخدام المستخدم للموقع
                                الالكتروني وبعد
                                إنهاء ذلك فيما يخص أي أمر أو نزاع بسبب أي أمر نشأ خلال فترة استخدام المستخدم للموقع
                                الالكتروني.</span>
                        </div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">لا يجوز للمستخدم التنازل عن هذا العقد ويجوز للشركة القيام بذلك دون
                                الحاجة
                                للحصول على
                                موافقة المستخدم.</span></div>
                    </div>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">يحق للشركة إنهاء هذا العقد واستخدام المستخدم للموقع الالكتروني بشكل
                                فوري
                                في حال خرق
                                المستخدم الشروط والأحكام أو في حال اعتقدت الشركة بناء على أسباب منطقية بأن المستخدم من
                                الممكن أن يقوم
                                بخرق بنود هذه الشروط والأحكام أو في حال قيام المستخدم بسلوك ترى الشركة أنه وبناء على
                                تقدير
                                الشركة المطلق
                                أنه غير مقبول.</span></div>
                    </div> <span lang="ar">المادة الحادية العشرة: عدم الانطباق القانوني واستقلالية
                        النصوص</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">في حال اعتبار أي بند من أحكام هذه الاتفاقية غير قانوني أو غير صالح أو
                                غير
                                قابل للتنفيذ،
                                سواء كلياً أو جزئيا، بموجب أي قانون، فلا يعد هذا الحكم أو الجزء منه، ويطبق مبدأ
                                استقلالية
                                النصوص دون أن
                                تتأثر قانونية وسريان وقابلية تنفيذ الأحكام الأخرى الواردة في هذه الشروط والأحكام.</span>
                        </div>
                    </div> <span lang="ar">المادة الثانية العشرة: النظام الواجب التطبيق وحل النزاعات</span><br>
                    <div class="styles_text_physical__Ail96">
                        <div><span lang="ar">تخضع هذه الأحكام والشروط إلى أنظمة المملكة العربية السعودية، وفي حال
                                نشوء
                                نزاع بين
                                المستخدم والشركة في شأن هذه الشروط والأحكام أو مخالفتها أو إنهائها أو تنفيذها أو تفسيرها
                                أو
                                صلاحيتها أو
                                استخدام الموقع الالكتروني أو الخدمات، فيتم تسوية تلك النزاعات ودياً وفي حال لم يتم حل
                                النزاع
                                ودياً خلال
                                60 يوماً من تاريخ اشعار احد الطرفين الأخر بالنزاع، فيوافق الأطراف انه وبشكل حصري يحال
                                النزاع
                                لتسويته من
                                خلال محاكم الرياض المختصة ووفقا للأنظمة المطبقة في المملكة العربية السعودية.</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        <div id="kind_of_saller_popUp"
            class=" hidden relative w-[600px] m-auto bg-white h-80 mt-80 rounded-xl flex flex-col items-end p-5 text-black">

            <i class="fa-solid fa-xmark-circle text-2xl absolute top-2 left-2 cursor-pointer"
                onclick="togglePopUp('kind_of_saller_popUp')"></i>

            <h1 class="text-3xl ">نوع البائع</h1>

            <div class="flex items-center justify-between gap-3 px-2 mt-10 w-full">
                <button wire:click="$set('tab', 'zaman')"
                    class="relative group focus:border-[#3A564F] mx-2 border p-3 rounded-2xl w-full">زمن</button>
                <button wire:click="$set('tab','enforcement')"
                    class="relative group focus:border-[#3A564F] mx-2 border p-3 rounded-2xl w-full">إنفاذ</button>

            </div>

            <hr class=" h-2 w-full mt-10">
            {{-- <div class="p-2 bg-[#3A564F] rounded w-20 text-white m-auto text-center cursor-pointer"
                onclick="togglePopUp('kind_of_saller_popUp')">تاكيد</div> --}}
        </div>

        <div id="kind_of_mazad_popUp"
            class="hidden relative w-[600px] m-auto bg-white h-80 mt-80 rounded-xl flex flex-col items-end p-5 text-black">

            <i class="fa-solid fa-xmark-circle text-2xl absolute top-2 left-2 cursor-pointer"
                onclick="togglePopUp('kind_of_mazad_popUp')"></i>

            <h1 class="text-3xl ">حالة المزاد</h1>

            <div class="flex items-center justify-between gap-3 px-2 mt-10 w-full">
                <button wire:click="$set('tab', 'underway')"
                    class="relative group focus:border-[#3A564F] mx-2 border p-3 rounded-2xl w-full">جاري
                    الآن</button>
                <button wire:click="$set('tab', 'coming')"
                    class="relative group focus:border-[#3A564F] mx-2 border p-3 rounded-2xl w-full">قادم</button>
                <button
                    wire:click="$set('tab', 'finished')"class="relative group focus:border-[#3A564F] mx-2 border p-3 rounded-2xl w-full">منتهي</button>


            </div>

            <hr class=" h-2 w-full mt-10">
            {{-- <div class="p-2 bg-[#3A564F] rounded w-20 text-white m-auto text-center cursor-pointer"
                onclick="togglePopUp('kind_of_mazad_popUp')">تاكيد</div> --}}
        </div>

    </div>



</div>
