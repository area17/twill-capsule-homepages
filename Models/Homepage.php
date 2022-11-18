<?php

namespace App\Twill\Capsules\Homepages\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Model;
use App\Twill\Capsules\Homepages\Scopes\MustBePublished;
use App\Twill\Capsules\Homepages\Support\Crops;

class Homepage extends Model
{
    use HasBlocks;
    use HasTranslation;
    use HasSlug;
    use HasMedias;
    use HasFiles;
    use HasRevisions;

    protected $fillable = [
        'published',
        'title',
        'description',
    ];

    public $translatedAttributes = [
        'title',
        'description',
        'active',
        'seo_title',
        'seo_description',
    ];

    public $slugAttributes = ['title'];

    public array $mediasParams = Crops::HOMEPAGE;

    protected static function booted()
    {
        static::addGlobalScope(new MustBePublished);
    }
}
