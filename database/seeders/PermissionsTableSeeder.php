<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'product_create',
            ],
            [
                'id'    => 23,
                'title' => 'product_edit',
            ],
            [
                'id'    => 24,
                'title' => 'product_show',
            ],
            [
                'id'    => 25,
                'title' => 'product_delete',
            ],
            [
                'id'    => 26,
                'title' => 'product_access',
            ],
            [
                'id'    => 27,
                'title' => 'blog_create',
            ],
            [
                'id'    => 28,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 29,
                'title' => 'blog_show',
            ],
            [
                'id'    => 30,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 31,
                'title' => 'blog_access',
            ],
            [
                'id'    => 32,
                'title' => 'top_label_create',
            ],
            [
                'id'    => 33,
                'title' => 'top_label_edit',
            ],
            [
                'id'    => 34,
                'title' => 'top_label_show',
            ],
            [
                'id'    => 35,
                'title' => 'top_label_delete',
            ],
            [
                'id'    => 36,
                'title' => 'top_label_access',
            ],
            [
                'id'    => 37,
                'title' => 'deal_create',
            ],
            [
                'id'    => 38,
                'title' => 'deal_edit',
            ],
            [
                'id'    => 39,
                'title' => 'deal_show',
            ],
            [
                'id'    => 40,
                'title' => 'deal_delete',
            ],
            [
                'id'    => 41,
                'title' => 'deal_access',
            ],
            [
                'id'    => 42,
                'title' => 'banner_create',
            ],
            [
                'id'    => 43,
                'title' => 'banner_edit',
            ],
            [
                'id'    => 44,
                'title' => 'banner_show',
            ],
            [
                'id'    => 45,
                'title' => 'banner_delete',
            ],
            [
                'id'    => 46,
                'title' => 'banner_access',
            ],
            [
                'id'    => 47,
                'title' => 'banne_slider_create',
            ],
            [
                'id'    => 48,
                'title' => 'banne_slider_edit',
            ],
            [
                'id'    => 49,
                'title' => 'banne_slider_show',
            ],
            [
                'id'    => 50,
                'title' => 'banne_slider_delete',
            ],
            [
                'id'    => 51,
                'title' => 'banne_slider_access',
            ],
            [
                'id'    => 52,
                'title' => 'offer_create',
            ],
            [
                'id'    => 53,
                'title' => 'offer_edit',
            ],
            [
                'id'    => 54,
                'title' => 'offer_show',
            ],
            [
                'id'    => 55,
                'title' => 'offer_delete',
            ],
            [
                'id'    => 56,
                'title' => 'offer_access',
            ],
            [
                'id'    => 57,
                'title' => 'special_offer_create',
            ],
            [
                'id'    => 58,
                'title' => 'special_offer_edit',
            ],
            [
                'id'    => 59,
                'title' => 'special_offer_show',
            ],
            [
                'id'    => 60,
                'title' => 'special_offer_delete',
            ],
            [
                'id'    => 61,
                'title' => 'special_offer_access',
            ],
            [
                'id'    => 62,
                'title' => 'contact_create',
            ],
            [
                'id'    => 63,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 64,
                'title' => 'contact_show',
            ],
            [
                'id'    => 65,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 66,
                'title' => 'contact_access',
            ],
            [
                'id'    => 67,
                'title' => 'static_page_create',
            ],
            [
                'id'    => 68,
                'title' => 'static_page_edit',
            ],
            [
                'id'    => 69,
                'title' => 'static_page_show',
            ],
            [
                'id'    => 70,
                'title' => 'static_page_delete',
            ],
            [
                'id'    => 71,
                'title' => 'static_page_access',
            ],
            [
                'id'    => 72,
                'title' => 'deal_today_create',
            ],
            [
                'id'    => 73,
                'title' => 'deal_today_edit',
            ],
            [
                'id'    => 74,
                'title' => 'deal_today_show',
            ],
            [
                'id'    => 75,
                'title' => 'deal_today_delete',
            ],
            [
                'id'    => 76,
                'title' => 'deal_today_access',
            ],
            [
                'id'    => 77,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
