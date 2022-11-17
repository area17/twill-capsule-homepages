<?php

namespace App\Twill\Capsules\Homepages\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\ModuleRepository;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Homepages\Scopes\MustBePublished;

class HomepageRepository extends ModuleRepository
{
    use HandleBlocks;
    use HandleTranslations;
    use HandleSlugs;
    use HandleMedias;
    use HandleFiles;
    use HandleRevisions;

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
                config('translatable.locale') ?? config('app.locale') => config('app.name'),
            ],

            'published' => true,
        ]);
    }
}
