<?php
return [
    // Refer to config/global/general.php

    // Assets
    'assets' => [
        'favicon' => 'media/logos/favicon.ico',
        'fonts'   => [
            'google' => [
                'Inter:300,400,500,600,700',
            ],
        ],
        'css'     => [
            'plugins/global/plugins.bundle.css',
            'plugins/global/plugins-custom.bundle.css',
            'css/style.bundle.css',
        ],
        'js'      => [
            'plugins/global/plugins.bundle.js',
            'js/scripts.bundle.js',
            'js/custom/widgets.js',
            'js/init.js',
        ],
    ],

    // Layout
    'layout' => [
        // Main
        'main'       => [
            'type' => 'default', // Set layout type: default|blank|none
        ],

        // Loader
        'loader'     => [
            'display' => true,
        ],

        // Header
        'header'     => [
            'width'     => 'fluid', // Set header width(fixed|fluid)
            'left'      => 'menu', // Set left part content(menu|page-title)
            'fixed'     => [
                'desktop'           => true,  // Set fixed header for desktop
                'tablet-and-mobile' => true // Set fixed header for talet & mobile
            ],
            'menu-icon' => 'svg' // Menu icon type(svg|font)
        ],

        // Toolbar
        'toolbar'    => [
            'display' => true, // Display toolbar
            'width'   => 'fluid', // Set toolbar container width(fluid|fixed)
            'fixed'   => [
                'desktop'           => true,  // Set fixed header for desktop
                'tablet-and-mobile' => false // Set fixed header for talet & mobile
            ],
            'layout'  => 'toolbar-1', // Set toolbar type
            'layouts' => [
                'toolbar-1' => [
                    'height'                   => '55px',
                    'height-tablet-and-mobile' => '55px',
                ],
                'toolbar-2' => [
                    'height'                   => '75px',
                    'height-tablet-and-mobile' => '65px',
                ],
                'toolbar-3' => [
                    'height'                   => '55px',
                    'height-tablet-and-mobile' => '55px',
                ],
                'toolbar-4' => [
                    'height'                   => '65px',
                    'height-tablet-and-mobile' => '65px',
                ],
                'toolbar-5' => [
                    'height'                   => '75px',
                    'height-tablet-and-mobile' => '65px',
                ],
            ],
        ],

        // Page title
        'page-title' => [
            'display'               => true, // Display page title
            'breadcrumb'            => true, // Display breadcrumb
            'description'           => false, // Display description
            'layout'                => 'default', // Set layout(default|select)
            'direction'             => 'row', // Flex direction(column|row))
            'responsive'            => true, // Move page title to cotnent on mobile mode
            'responsive-breakpoint' => 'lg', // Responsive breakpoint value(e.g: md, lg, or 300px)
            'responsive-target'     => '#kt_toolbar_container' // Responsive target selector
        ],

        // Aside
        'aside'      => [
            'display'   => true, // Display aside
            'theme'     => 'dark', // Set aside theme(dark|light)
            'menu'      => 'main', // Set aside menu(main|documentation)
            'fixed'     => true,  // Enable aside fixed mode
            'minimized' => false, // Set aside minimized by default
            'minimize'  => true, // Allow aside minimize toggle
            'hoverable' => true, // Allow aside hovering when minimized
            'menu-icon' => 'svg' // Menu icon type(svg|font)
        ],

        // Scrolltop
        'scrolltop'  => [
            'display' => true // Display scrolltop
        ],
    ],
];
