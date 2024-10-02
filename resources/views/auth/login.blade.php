<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>Login | Admin</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        body {
            overflow-x: hidden; /* إزالة التمرير الجانبي */
            background-image: url('{{ asset('login.png') }}'); /* تحديد الصورة الخلفية */
            background-size: cover; /* تغطية الخلفية */
            background-position: center; /* محاذاة الصورة إلى المركز */
            height: 100vh; /* جعل الجسم بطول الشاشة */
        }

        /* إضافة أسلوب لجعل النموذج أصغر */
        .login-form {
            max-width: 400px; /* الحد الأقصى للعرض */
            width: 100%; /* عرض كامل حتى الحد الأقصى */
            padding: 30px; /* إضافة حشوة */
            background-color: rgba(255, 255, 255, 0.9); /* خلفية بيضاء مع شفافية */
            border-radius: 10px; /* زوايا دائرية */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* ظل */
        }

        /* تقليل حجم الخلفية على شاشات الموبايل */
        @media (max-width: 767px) {
            body {
                background-size: cover; /* استخدام cover على الموبايل أيضًا */
                background-repeat: no-repeat; /* عدم تكرار الخلفية */
                background-position: center; /* محاذاة الصورة إلى المركز */
            }

            .login-form {
                padding: 20px; /* تقليل الحشوة على الشاشات الصغيرة */
                margin: 10px; /* إضافة مسافة حول النموذج */
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-100 d-flex justify-content-center align-items-center">
            <div class="login-form">
                <div class="mt-4">
                    <form action="{{ route('login.check') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com or +966-XX-XXXXXXX" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="******" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            تسجيل الدخول
                        </button>
                    </form>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-muted small">لا تمتلك حساب؟ <a href="/register" class="fw-semibold text-primary">سجل الآن</a></p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ Session::get('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>

</html>
