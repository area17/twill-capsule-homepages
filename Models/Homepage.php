<?php

namespace App\Twill\Capsules\Homepages\Models;

use App\Twill\Base\Crops;
use App\Twill\Base\Model;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;

class Homepage extends Model implements Sortable
{
    use HasBlocks,
        HasTranslation,
        HasSlug,
        HasMedias,
        HasFiles,
        HasRevisions,
        HasPosition;

    protected $fillable = ['published', 'title', 'description', 'position'];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
        'seo_title',
        'seo_description',
    ];

    public $slugAttributes = ['title'];

    public array $mediasParams = Crops::HOMEPAGE;
}
