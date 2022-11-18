<?php

namespace App\Twill\Capsules\Homepages\Http\Controllers;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Twill\Capsules\Homepages\Repositories\HomepageRepository;

class HomepageController extends ModuleController
{
    protected $moduleName = 'homepages';

    protected $previewView = 'site.homepage';

    public function landing(HomepageRepository $pages)
    {
        return view(
            $this->getViewPrefix() . '.form',
            $this->form($pages->getHomepage()->id),
        );
    }

    protected function formData($request): array
    {
        return [
            'editor' => false,

            'customPermalink' => route('front.home'),
        ];
    }
}
