<?php

return [
    // @ Here
    // Main menu
    'main'          => [
        // Dashboard
        [
            'title' => 'داشبورد',
            'path'  => '/admin/dashboard',
            'icon'  => theme()->getSvgIcon("media/icons/duotune/art/art002.svg", "svg-icon-2 13123"),
            'bullet' => '<span class="bullet bullet-dot"></span>',

        ],

        [
            'title' => 'مدیران',
            'path'  => '/admin/admins',
            // 'icon'       => [
            //     'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
            //     'font' => '<i class="bi bi-layers fs-3"></i>',
            // ],
            'icon' => '<i class="fa-solid fa-person"></i>',
        ],

        // Modules
        [
            'classes' => ['content' => 'pt-8 pb-2'],
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">بخش ها</span>',
        ],

        // Account
        [
            'title'      => 'حساب',
            'icon'       => [
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ],
            'classes'    => ['item' => 'menu-accordion'],
            'attributes' => [
                "data-kt-menu-trigger" => "click",
            ],
            'sub'        => [
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => [
                    // [
                    //     'title'  => 'مدیران',
                    //     'path'   => 'admin/admins',
                    //     'bullet' => '<span class="bullet bullet-dot"></span>',
                    // ],
                    [
                        'title'  => 'کاربران',
                        'path'   => 'admin/user',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ],
                    // [
                    //     'title'      => 'Security',
                    //     'path'       => '#',
                    //     'bullet'     => '<span class="bullet bullet-dot"></span>',
                    //     'attributes' => [
                    //         'link' => [
                    //             "title"             => "Coming soon",
                    //             "data-bs-toggle"    => "tooltip",
                    //             "data-bs-trigger"   => "hover",
                    //             "data-bs-dismiss"   => "click",
                    //             "data-bs-placement" => "right",
                    //         ],
                    //     ],
                    // ],
                ],
            ],
        ],

        // System
        [
            'title'      => 'متخصص ها',
            'icon'       => [
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ],
            'classes'    => ['item' => 'menu-accordion'],
            'attributes' => [
                "data-kt-menu-trigger" => "click",
            ],
            'sub'        => [
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => [
                    // [
                    //     'title'      => 'Settings',
                    //     'path'       => '#',
                    //     'bullet'     => '<span class="bullet bullet-dot"></span>',
                    //     'attributes' => [
                    //         'link' => [
                    //             "title"             => "Coming soon",
                    //             "data-bs-toggle"    => "tooltip",
                    //             "data-bs-trigger"   => "hover",
                    //             "data-bs-dismiss"   => "click",
                    //             "data-bs-placement" => "right",
                    //         ],
                    //     ],
                    // ],
                    [
                        'title'  => 'متخصص ها',
                        'path'   => 'admin/experts',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ],
                    [
                        'title'  => 'تخصص ها',
                        'path'   => 'admin/expertises',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ],
                    [
                        'title'  => 'بیمه ها',
                        'path'   => 'admin/insurances',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ],
                    [
                        'title'  => 'کلینیک ها',
                        'path'   => 'admin/clinics',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ],
                ],
            ],
        ],

        [
            'title'  => 'تخصص ها',
            'path'   => 'admin/expertises',
            'bullet' => '<span class="bullet bullet-dot"></span>',
        ],

    ],
    // Horizontal menu
    'horizontal'    => [

        [
            'title'   => 'داشبورد',
            'path'    => '',
            'classes' => ['item' => 'me-lg-1'],
        ],

        [
            'title'   => 'داشبورد',
            'path'    => '',
            'classes' => ['item' => 'me-lg-1'],
        ],


        [
            'title'   => 'داشبورد',
            'path'    => '',
            'classes' => ['item' => 'me-lg-1'],
            'items'   => [
                [
                    'title'  => 'کلینیک ها',
                    'path'   => 'admin/clinics',
                    'bullet' => '<span class="bullet bullet-dot"></span>',
                ],
            ]
        ],

    ],

];
