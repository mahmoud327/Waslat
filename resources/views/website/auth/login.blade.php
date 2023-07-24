@extends('website.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container">

        <div id="login">
            <h1>تسجيل الدخول</h1>
            <p style="padding: 0 20px 20px 20px; color: black;">ادخل رقم هاتقك</p>
            <div class="input" id="inputbox">
                <button>+996</button>
                <input type="tel" placeholder="رقم" id="display"><br>

            </div>
            <span id="alert" style="color: red;"></span>
            <button id="btn">استمرار</button>
            <p style="color: black;">عند المتابعة، أوافق على</p>
            <p><a href="/pages/privacy/privacy.html">وسياسة الخصوصية</a> <a href="">.الشروط والأحكام</a></p>

        </div>
        <div id="menu">
            <ul>
                <p id="p">سجل الدخول لتجربة <br> مستخدم أفضل</p>

                <li style="display: flex ;justify-content: space-between; height: 80px;">
                    <p>
                        <i class="fa-solid fa-wallet" style="color: #2e2a2a;"></i>
                        <span style="margin-right: 10px;"> محفظة وصلت <br><span style="margin-right: 10px;">الإلكترونية
                                </span< /span>

                    </p>

                    <p
                        style="height: 30px; width: 60px; background-color:#10a26f; padding: 1px; color: #fff; border-radius: 5px; text-align: center; margin-left: 5px;">
                        جديد</p>
                </li>

                <li> <i class="fa-regular fa-heart"></i> <span>
                        المفضلة</span></li>
                <li><i class="fa-regular fa-clock"></i>
                    <span>نشاطك</span>
                </li>
            </ul>
        </div>






    </div>
@endsection
