<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Core\Enums\EnumsOption;
use App\Core\Enums\EnumsPost;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($record) {
            Option::create([
                "key" => $record["key"],
                "default" => $record["default"],
            ]);
        },[
            [
                ### سربرگ داشبورد
                'key' => EnumsOption::DASHBOARD_TITLE,
                'default' => NULL
            ],
            [
                ### توضیحات داشبورد
                'key' => 'dashboard_description',
                'default' => NULL
            ],
            [
                ### آیا بصورت خصوصی در بیاید
                'key' => EnumsOption::DASHBOARD_PRIVATE,
                'default' => FALSE
            ],
            [
                ### آیدی دیفالت کسی که میخواهد عضو شود
                'key' => EnumsOption::DASHBOARD_DEFAULT_REGISTER_ROLE,
                'default' => NULL
            ],
            [
                ### آیا هر کسی میتواند لاگین کند
                'key' => EnumsOption::DASHBOARD_CAN_REGISTER,
                'default' => TRUE
            ],
            [
                ### کپی رایت داشبورد
                'key' => EnumsOption::DASHBOARD_FOOTER_COPYRIGHT,
                'default' => NULL
            ],
            [
                ### قوانین زمان ثبت نام
                'key' => 'dashboard_register_rule',
                'default' => NULL
            ],
            [
                ### کپی رایت نوتیفیکیشن
                'key' => EnumsOption::NOTIFICATION_COPYRIGHT,
                'default' => NULL
            ],
            [
                ### پیام زمانی که نوتیفکیشن زمان ثبت نام ثبت میشود
                'key' => EnumsOption::NOTIFICATION_CONFIRM_REGISTER,
                'default' => NULL
            ],
            [
                ### سابجکت درخواست تایید ثبت نام
                'key' => EnumsOption::NOTIFICATION_CONFIRM_REGISTER_SUBJECT,
                'default' => NULL
            ],
            [
                ### توکن اینستاگرام
                'key' => EnumsOption::TOKEN_INSTAGRAM,
                'default' => NULL
            ],
            [
                ### متن سابسکرایب
                'key' => EnumsOption::SUBSCRIBE_TEXT,
                'default' => NULL
            ],
            [
                ### آیدی گیتهاب برای معرفی
                'key' => EnumsOption::GITHUB_ACCOUNT,
                'default' => NULL
            ],
            [
                ### آیدی لینکدین برای معرفی
                'key' => EnumsOption::LINKDIN_ACCOUNT,
                'default' => NULL
            ],
            [
                ### آیدی توییتر برای معرفی
                'key' => EnumsOption::TWITTER_ACCOUNT,
                'default' => NULL
            ],
            [
                ### آیدی جیمیل برای معرفی
                'key' => EnumsOption::GMAIL_ACCOUNT,
                'default' => NULL
            ],
            [
                ### آیدی تلگرام برای معرفی
                'key' => EnumsOption::TELEGRAM_ACCOUNT,
                'default' => NULL
            ],
            [
                ### آیدی اینستاگرام برای معرفی
                'key' => EnumsOption::INSTAGRAM_ACCOUNT,
                'default' => NULL
            ],
            [
                ### توضیحات کوتاه در مورد سایت
                'key' => EnumsOption::ABOUTE_US,
                'default' => NULL
            ],
            [
                ### آدرس محل سکونت
                'key' => EnumsOption::ADDRESS,
                'default' => NULL
            ],
            [
                ### آدرس ایمیل جهت پشتیبانی
                'key' => EnumsOption::SUPPORT_EMAIL,
                'default' => NULL
            ],
            [
                ### تلفن جهت پشتیبانی
                'key' => EnumsOption::SUPPORT_TELLPHONE,
                'default' => NULL
            ],
            [
                ### شماره موبایل جهت پشتیبانی
                'key' => EnumsOption::SUPPORT_MOBILE,
                'default' => NULL
            ],
            [
                ### فکس جهت پشتیبانی
                'key' => EnumsOption::SUPPORT_FAX,
                'default' => NULL
            ],
            [
                ### تعداد ستاره های امتیازدهی
                'key' => EnumsOption::COUNT_VOTE_STAR,
                'default' => 5
            ],
            [
                ### توانایی تکرار امتیاز دهی را دارد؟.
                'key' => EnumsOption::MEMBER_CAN_EDIT_VOTE,
                'default' => TRUE
            ],
            [
                ### فقط اعضا و میمهان توانایی امتیازدهی پست ها را دارند
                'key' => EnumsOption::CAN_VOTE_POSTS,
                'default' => ['guest', 'member']
            ],
            [
                ### فقط اعضا و میهمان توانایی امتیازدهی برگه ها را دارند
                'key' => EnumsOption::CAN_VOTE_PAGES,
                'default' => ['guest', 'member']
            ],
            [
                ### فقط اعضا و میهمان توانایی امتیازدهی محصولات را دارند
                'key' => EnumsOption::CAN_VOTE_PRODUCTS,
                'default' => ['guest', 'member', 'customer']
            ],
            [
                ### چه وضعیت های جدول پست میتواند امتیاز بگیرد
                'key' => EnumsOption::VOTE_ITEMS_ENABLE,
                'default' => [
                    EnumsPost::TYPE_POST,
                    EnumsPost::TYPE_PAGE,
                    EnumsPost::TYPE_PRODUCT
                ]
            ],
            [
                ### سربرگ فروشگاه
                'key' => EnumsOption::SHOP_TITLE,
                'default' => NULL
            ],
            [
                ### توضیحات فروشگاه
                'key' => EnumsOption::SHOP_DESCRIPTION,
                'default' => NULL
            ],
            [
                ### واحد ارزی
                'key' => EnumsOption::SHOP_CURRENCY,
                'default' => NULL
            ],
            [
                ### چه وضعیت های جدول پست میتواند کامنت بگیرد
                'key' => EnumsOption::CAN_COMMENT_POSTS,
                'default' => [
                    EnumsPost::TYPE_POST,
                    EnumsPost::TYPE_PAGE,
                    EnumsPost::TYPE_PRODUCT
                ]
            ],
            [
                ### توانایی ریپلای کامنت وجود داشته باشد
                'key' => EnumsOption::THREAD_COMMENTS,
                'default' => TRUE
            ],
            [
                ### حداکثر عمق برای کامنت ها چقدر باشد
                'key' => EnumsOption::THREAD_COMMENTS_DEPTH,
                'default' => 4
            ],
            [
                ### برای کامنت دهی باید وارد حساب کاربری شوند
                'key' => EnumsOption::COMMENT_REGISTRATION,
                'default' => FALSE
            ],
            [
                ### کامنت ها صفحه بندی شوند
                'key' => EnumsOption::PAGE_COMMENTS,
                'default' => TRUE
            ],
            [
                ### حداکثر آیتم های کامنت در صفحه
                'key' => EnumsOption::COMMENTS_PER_PAGE,
                'default' => 50
            ],
            [
                ### کامنت ها به چه صورتی مرتب گردند
                'key' => EnumsOption::COMMENT_ORDER,
                'default' => 'desc'
            ],
            [
                ### بصورت پیشفرض کامنت ها چگونه مرتب شوند
                'key' => EnumsOption::DEFAULT_COMMENTS_PAGE,
                'default' => 'desc'
            ],
            [
                ### نظارت بر روی نظرات
                'key' => EnumsOption::COMMENT_MODERATION,
                'default' => TRUE
            ],
            [
                ### چه کسی میتواند نظرها را لایک کند
                'key' => EnumsOption::CAN_LIKE_COMMENTS,
                'default' => ['guest', 'member']
            ],
            [
                ### توانایی لایک برای چه کسایی وجود دارد؟
                'key' => EnumsOption::LIKE_ITEMS_ENABLE,
                'default' => ['comment']
            ],
            [
                ### افراد میتوانند لایک های خود را عوض کنند؟
                'key' => EnumsOption::MEMBER_CAN_EDIT_LIKE,
                'default' => 1
            ],
            [
                ### لوگو
                'key' => EnumsOption::LOGO,
                'default' => NULL
            ],
            [
                ### فاوآیکون
                'key' => EnumsOption::FAVICON,
                'default' => NULL
            ],
        ]);
    }
}
