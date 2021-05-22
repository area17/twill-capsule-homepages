<?php

namespace App\Twill\Capsules\Homepages\Support;

class Crops
{
    // Modules

    const HOMEPAGE = [
        'role-homepage-cover' => self::DESKTOP + self::MOBILE + self::SQUARE,

        'role-homepage-slideshow' => self::ORIGINAL,
    ];

    // Block editor

    const BLOCK_EDITOR = self::ALL_CROPS;

    // Base crops definition

    const ALL_CROPS = [
        'role-all' =>
            self::DESKTOP + self::MOBILE + self::SQUARE + self::ORIGINAL,
    ];

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

    const SQUARE = [
        'square' => [
            [
                'name' => 'square',
                'ratio' => 1,
            ],
        ],
    ];

    const ORIGINAL = [
        'original' => [
            [
                'name' => 'original',
                'ratio' => null,
            ],
        ],
    ];
}
