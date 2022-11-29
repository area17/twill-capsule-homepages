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

When it's done, you can clone the repo, copy the zip file or do it via

```shell
php artisan twill:capsule:install homepages --copy
```

Next, enable the capsule in your Twill configuration:

```php
    'capsules' => [
        'list' => [
            [
                'name' => 'Homepages',
                'enabled' => true
            ],
        ],
    ],
```

After that, create a `front.home` route to your homepage:

```php
Route::get('/', fn() => print('This is the homepage'))->name('front.home');
```

Finally, add this to `twill-navigation.php` to make your homepage link go directly to the edit page:

```php
return [
    'homepages' => [
        'title' => 'Homepage',
        'route' => 'admin.homepages.landing',
    ],
]
```

## Configuration

If you want to add fields in your homepage table go to `app/Twill/Capsules/Homepages/database/migrations` and modify the `create_homepages_table.php` file.

**Note:** If you want to add a new field to your homepage table, you will need to add it to the `fillable` property of the `App\Twill\Capsules\Homepages\Models\Homepage` model, and to the form in `app/Twill/Capsules/Homepages/resources/views/admin/form.blade.php`.

When you are ready, don't forget to run the migration:

```shell
php artisan migrate
```

After that, refresh your admin view, you should see a new entry in your navigation bar.

Go into it and manage your homepage.
