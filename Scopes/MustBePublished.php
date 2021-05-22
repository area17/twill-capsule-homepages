<?php

namespace App\Twill\Capsules\Homepages\Scopes;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MustBePublished extends Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if ($this->isRunningOnFrontend() && $this->isPublishable($model)) {
            $builder->where("{$model->getTable()}.published", true);
        }
    }

    function isRunningOnFrontend(): bool
    {
        return Str::startsWith(optional(request()->route())->getName(), [
            'front.',
            'api.',
        ]);
    }
}
