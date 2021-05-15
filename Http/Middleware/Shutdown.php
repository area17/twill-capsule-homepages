<?php

namespace App\Twill\Capsules\Homepages\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Twill\Capsules\Homepages\Repositories\HomepageRepository;

class Shutdown
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $response = $next($request);

        if (is_running_on_frontend()) {
            $homepage = app(HomepageRepository::class)->getHomepage();

            if (!$homepage->published) {
                abort(503);
            }
        }

        return $response;
    }
}
