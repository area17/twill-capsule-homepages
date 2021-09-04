<?php

namespace App\Twill\Capsules\Homepages\Repositories;

use App\Twill\Capsules\Base\Templates;
use App\Twill\Capsules\Base\ModuleRepository;
use App\Twill\Capsules\Base\Scopes\MustBePublished;
use A17\Twill\Repositories\Behaviors\HandleBlocks;
use App\Transformers\Homepage as HomepageTransformer;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use App\Twill\Capsules\Homepages\Models\Homepage;

class HomepageRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions;

    protected string $templateName = Templates::HOMEPAGE;

    protected string $transformerClass = HomepageTransformer::class;

    public function __construct(Homepage $model)
    {
        $this->model = $model;
    }

    public function getHomepage()
    {
        if (filled($homepage = $this->theOnlyOne())) {
            return $homepage;
        }

        return $this->generate();
    }

    private function theOnlyOne()
    {
        return $this->model
            ->newQuery()
            ->withoutGlobalScope(MustBePublished::class)
            ->orderBy('id')
            ->take(1)
            ->get()
            ->first();
    }

    private function generate()
    {
        return app(HomepageRepository::class)->create([
            'title' => [
                config('translatable.locale') => config('app.name'),
            ],

            'published' => true,
        ]);
    }
}
