<?php
$database = include_once('../libraries/connect-mysql.php');

$menus = [
            'fields' => 'name',
            'values' => [
                ['Trang chủ'],
                ['Nhật ký'],
                ['Lập trình'],
                ['Về tôi'],
                ['Liên hệ']
            ]
        ];
//$database->insert($menus, 'menus')->execute();

$infos = [
    'fields' => '`key`,value',
    'values' => [
        ['facebook', 'https://facebook.com/taton13'],
        ['phone', '08738543553']
    ]
];
//$database->insert($infos, 'infos')->execute();

//$result = $database->select(['*'], 'menus')->fetchAll();

// insert banners
$banners = [
    'fields' => 'title,content,image',
    'values' => [
        ['title 1', 'content 1', 'banner1.jpg'],
        ['title 2', 'content 2', 'banner2.jpg'],
        ['title 3', 'content 3', 'banner3.jpg'],
        ['title 4', 'content 4', 'banner4.jpg']
    ]
];
//$database->insert($banners, 'banners')->execute();

$articles = [
    'fields' => 'title,create_time,category,avatar,content',
    'values' => [
        ['title 1', '2018-06-01 22:30:00', 'programing', 'avatar1.jpg', 'content 1'],
        ['title 2', '2018-06-01 22:30:00', 'relax', 'avatar2.jpg', 'content 2'],
        ['title 3', '2018-06-01 22:30:00', 'game', 'avatar3.jpg', 'content 3'],
        ['title 4', '2018-06-01 22:30:00', 'programing', 'avatar4.jpg', 'content 4'],
        ['title 5', '2018-06-01 22:30:00', 'relax', 'avatar5.jpg', 'content 5'],
    ]
];

$database->insert($articles, 'articles')->execute();
