<?php

namespace App\Twill\Capsules\Homepages\Support;

class Crops
{
    // Modules

    const HOMEPAGE = [
        'role-homepage-cover' => self::DESKTOP + self::MOBILE,
    ];

    // Crops

    const DESKTOP = [
        'desktop' => [
            [
                'name' => 'desktop',
                'ratio' => 16 / 9,
            ],
        ],
    ];

    const MOBILE = [
        'mobile' => [
            [
                'name' => 'mobile',
                'ratio' => 3 / 2,
            ],
        ],
    ];
}
