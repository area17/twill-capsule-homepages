# Homepages Capsule

### A [Twill Capsule](https://github.com/area17/twill) to create a Home page for your website

![screenshot](docs/screenshot-1.png)

### Description

This Capsule aims to create a single page home page and for that it ensures you will always have one and only one homepage record on your database.

It also contains a middleware to shut down your website (like the `php artisan down` command) when unpublishing the homepage:

```php
protected $middleware = [
    ...
    \App\Twill\Capsules\Homepages\Http\Middleware\Shutdown::class,
];
```

**Please make sure your users have the proper permissions to edit/unpublish the homepage.**

## Installing

Before to use capsules, you need to get a [Laravel](https://laravel.com/docs/9.x/installation) app booted with [Twill](https://github.com/area17/twill) on it.

When it's done, you can clone, copy the zip or do it via

```
php artisan twill:capsule:install homepages --copy
```

Enable the capsule in your Twill configuration:

```php
    'capsules' => [
        'list' => [
            [
                'name' => 'Homepages',
                'enabled' => true
            ],
        ]
    ],
```

Create a `front.home` route to your homepage:

```php
Route::get('/', fn() => print('This is the homepage'))->name('front.home');
```

## Navigation

Add this to `twill-navigation.php` to make your homepage link go directly to the edit page:

```php
return [
    'homepages' => [
        'title' => 'Homepage',
        'route' => 'admin.homepages.landing',
    ],
]
```
