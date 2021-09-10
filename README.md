<div dir="rtl" align="right">

<h1 dir="ltr" align="left">AMEN</h1>
<h2>وب سرویس Amen چیست ؟</h2>

<p>وب سرویس آمن یک وب سرویس امن برای افرادی هست که قصد دارند وبلاگ  و یا فروشگاه خودشون رو با هر سلیقه ای راه اندازی کنند و توسعه دهند ولی وقت کافی برای پیاده سازی وب سرویس مورد نظر را ندارند این سرویس متشکل از ویژگی های است که کد نویسی و توسعه را آسان مینماید.</p>

## ویژگی ها
- ✅احراز هویت
- ✅مدیریت سطح دسترسی نقش ها
- ✅مدیریت برچسب ها
- ✅مدیریت دسته بندی ها
- ✅مدیریت کاربران
    - جزییات کاربری
    - بازدید های کاربری
    - پست های کاربری 
    - برگه های کاربری
    - مهارتهای کاربری
    - نمونه کارهای کاربری
    - دیدگاه های کاربری
    - محصولات کاربری
- ✅مدیریت مهارت ها
- ✅مدیریت فایل ها
- ✅مدیریت برگه ها
- ✅مدیریت پست ها
- ❌مدیریت محصولات
- ❌مدیریت سفارشات و فروش
- ❌مدیریت نمونه کارها
- ❌مدیریت نظرات
- ❌مدیریت نقل و قول های مشتریان
- ❌مدیریت فهرست ها
- ❌مدیریت اسلایدر
- ❌مدیریت تماسها

<br />

## نصب
این ریپوزیتوری را دانلود و یا clone نمایید سپس به مسیر پوشه amen رفته و کامندلاین را باز نمایید و composer را نصب نمایید تا پکیج های مربوطه نصب گردد.
</div>

```php
git clone https://github.com/ghaninia/amen.git
```

```php
composer install
```

<p dir="rtl" align="right">بعد از نصب باید کانفیگ مربوطه دیتابیس را در انجام دهیم کافی است فایل .env را ویرایش نمایید و بعد از آن میتوانید دیتابیس را migrate و داده های فیک را به دیتابیس بیافزایید.</p>

```php
php artisan migrate
```

```php
php artisan db:seed
```

<p dir="rtl" align="right">
    در صورت بررسی صحت نوع عملکرد, تست سیستم را اجرا نمایید
</p>

```php
php artisan test
```

<a href="https://documenter.getpostman.com/view/14577533/TzmBCtDy#7ee5cd45-65dd-4666-a9d6-b7d498982d75" target="_blank">
داکیومنت وب سرویس
</a>
|
<a href="https://trello.com/b/4HK9UyyD/amen" target="_blank">
اسکروم برد
</a>
