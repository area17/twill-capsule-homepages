<?php

use Illuminate\Support\Str;

function is_running_on_frontend(): bool
{
    return Str::startsWith(
        optional(request()->route())->getName(),
        config('twill.capsule.homepages.frontend_prefixes')
    );
}
