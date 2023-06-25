<?php

return [
    'userManagement' => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователи',
    ],
    'permission' => [
        'title'          => 'Разрешения',
        'title_singular' => 'Разрешение',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Роли',
        'title_singular' => 'Роль',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Пользователи',
        'title_singular' => 'Пользователь',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'category' => [
        'title'          => 'Kategoriyalar',
        'title_singular' => 'Kategoriyalar',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => 'Kategoriya nomi',
            'icon'              => 'Icon',
            'icon_helper'       => 'Kategoruya ikonkasi',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'parent'            => 'Parent',
            'parent_helper'     => 'Ota kategoriyasi',
        ],
    ],
    'product' => [
        'title'          => 'Mahsulotlar',
        'title_singular' => 'Mahsulotlar',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'category'                 => 'Mahsulot kategoriyasi',
            'category_helper'          => 'Mahsulot kategoriyasini tanlang',
            'name'                     => 'Nomi',
            'name_helper'              => 'Mahsulot nomi',
            'price'                    => 'Narxi',
            'price_helper'             => 'Narxi',
            'short_description'        => 'Qisqacha tavsif',
            'short_description_helper' => 'Productga o\'tganda va card da korinadigan qisqacha biror nima yozing',
            'description'              => 'Asosiy tavsif',
            'description_helper'       => 'Asosiy tavsif',
            'card_photo'               => 'Card da ko\'rinadigan rasmi',
            'card_photo_helper'        => 'Bu joyga home page dagi cardlarda korinadigan mahsulot rasmini kiritasiz',
            'photos'                   => 'Mahsulotning rasmlari',
            'photos_helper'            => 'Mahsulot uchun mahsulot sahifasiuchun  rasmlar tanlang.',
            'is_sale'                  => 'Mahsulot uchun chegorma bormi?',
            'is_sale_helper'           => 'Agar mahsulotingizda chegirma bo\'lsa belgilang va chegirma vaqti va boshqalarni to\'ldiring',
            'sale_price'               => 'Chegirmadagi narxi',
            'sale_price_helper'        => 'Mahsulotning chegirma narxi',
            'sale'                     => 'Chegirma foizi',
            'sale_helper'              => 'Chegirma foizi (narx yoki foiz kiriting)',
            'sale_start'               => 'Chegirma boshlanish sanasi',
            'sale_start_helper'        => ' ',
            'end_sale'                 => 'Chegirma tugash sanasi',
            'end_sale_helper'          => ' ',
            'status'                   => 'Mahsulot ko\'rsatilsinmi?',
            'status_helper'            => 'Mahsulotning saytda korsatish yoki korsatmaslik',
            'meta_title'               => 'Meta Title',
            'meta_title_helper'        => 'SEO uchun title',
            'meta_description'         => 'Meta Description',
            'meta_description_helper'  => 'SEO uchun',
            'meta_tags'                => 'Meta Tags',
            'meta_tags_helper'         => 'Meta Teglar (,) bilan kichik harflarda ajratib yozing',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'is_trend'                 => 'Trending bo\'limida ko\'rsatilsinmi',
            'is_trend_helper'          => ' ',
        ],
    ],
    'blog' => [
        'title'          => 'Blog',
        'title_singular' => 'Blog',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'card_photo'              => 'Card uchun rasm',
            'card_photo_helper'       => ' ',
            'photo'                   => 'Blog rasmi',
            'photo_helper'            => ' ',
            'title'                   => 'Mavzu',
            'title_helper'            => ' ',
            'description'             => 'Matni',
            'description_helper'      => ' ',
            'start'                   => 'Saytga chiqish sanasi',
            'start_helper'            => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'meta_title'              => 'Meta Title',
            'meta_title_helper'       => ' ',
            'meta_description'        => 'Meta Description',
            'meta_description_helper' => ' ',
            'meta_tags'               => 'Meta Tags',
            'meta_tags_helper'        => ' ',
            'end'                     => 'Saytdan o\'chirish sanasi',
            'end_helper'              => ' ',
        ],
    ],

];
