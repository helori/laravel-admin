# laravel-admin
This package allows you to create admin users (different than your application's users).
It uses a custom guard and comes with Laravel auth views : login, register, password reset...
It is especially useful when building protected areas (e.g. control panels) without the need to re-build everything.

## Installation and setup

On a fresh Laravel (>= v5.4) installation, install the package by running:
```bash
composer require helori/laravel-admin
```

Configure your application (Laravel version < 5.5):
```php
// config/app.php
'providers' => [
    ...
    Helori\LaravelAdmin\AdminServiceProvider::class,
];
```

Setup the guard, provider and password reset options to handle administrator authentication :
```php
// config/auth.php
'guards' => [
    ...
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],
'providers' => [
    ...
    'admins' => [
        'driver' => 'eloquent',
        'model' => Helori\LaravelAdmin\Models\Admin::class,
    ]
],
'passwords' => [
    ...
    'admins' => [
        'provider' => 'admins',
        'table' => 'admins_resets',
        'expire' => 60,
    ],
],
```
Configure redirection if an auth exception is raised :
```php
// app/Exceptions/Handler.php
use Illuminate\Auth\AuthenticationException;
...
protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    $guard = array_get($exception->guards(), 0);
    if($guard === 'admin'){
        return redirect()->guest(route('admin-login'));
    }else{
        return redirect()->guest(route('login'));
    }
}
```
Configure redirection if an administrator is already authenticated :
```php
// app/Middleware/RedirectIfAuthenticated.php
public function handle($request, Closure $next, $guard = null)
{
    if (Auth::guard($guard)->check()) {
        if($guard === 'admin'){
            return redirect()->route('admin-home');
        }else{
            return redirect('/');
        }
    }

    return $next($request);
}
```

Run the migrations:
```bash
php artisan migrate
```

Create the first administrator to be able to connect the first time:
```bash
php artisan tinker
$admin = new \Helori\LaravelAdmin\Models\Admin
$admin->name = 'John'
$admin->email = 'john@domain.com'
$admin->password = bcrypt('john_password')
$admin->save()
exit
```

Publish the laravel-admin default assets:
```bash
php artisan vendor:publish --tag=laravel-admin-assets
```

Install the package's font-end dependencies: 
```bash
npm install jquery@3.* bootstrap@4.* --save-dev
```

Edit your laravel mix config file :
```js
// webpack.mix.js
mix.sass(
    "./resources/assets/sass/admin.scss",
    "./public/css/admin.css"
).js(
    "./resources/assets/js/admin.js",
    "./public/js/admin.js", "."
);
```

Compile your assets :
```bash
npm run dev
```

Your admin auth should be available at:
```bash
http://your-domain.test/admin/login
```

Start creating protected views :
```php
// routes/web.php
...
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function ()
{
    Route::get('/', function(){
        return view('your-admin-home');
    });
    ...
});
```