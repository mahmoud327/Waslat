<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; direction: rtl; text-align: right; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>بناءً على طلبكم، نقدم لكم عرض سعر لتصميم تطبيق خاص لشركة مواد غذائية وسلسلة هايبر ماركت. سيشمل التطبيق التالي:</p>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
    <p><strong>اللغات المستخدمة:</strong></p>
    <ul>
        @foreach ($languages as $language)
            <li>{{ $language }}</li>
        @endforeach
    </ul>
    <p><strong>مدة المتابعة:</strong> {{ $duration }}</p>
    <p><strong>عرض السعر:</strong> {{ $price }}</p>
</body>
</html>
