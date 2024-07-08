<p align="center"><a href="https://www.youtube.com/watch?v=PTE6GHgfh1Q" target="_blank"><img src="https://i9.ytimg.com/vi/PTE6GHgfh1Q/sddefault.jpg?v=668bf9a6&sqp=CMD0r7QG&rs=AOn4CLC8spyTL1dUYKRjF9JSHfiamrAddg" width="400" alt="Laravel Logo"></a></p>

## How to Use Multiple Languages in Laravel
Welcome to the repository for the tutorial video on how to use multiple languages in Laravel! This README provides a summary of the video content and additional resources.
## Video Link

Watch the full tutorial on YouTube: [How to Use Multiple Languages in Laravel](https://www.youtube.com/watch?v=PTE6GHgfh1Q)

## Topics Covered

- Introduction to Laravel Localization and Internationalization (i18n)
- Setting up Language Files and Directories
- Creating Language Keys and Translations
- Switching between Languages Dynamically
- Best Practices for Multi-language Support in Laravel

## Instructions

- 1.Download freash laravel project
- 2.create language folder and assign text inside resoures folder
- 3.create route, controller and assign function
- 4.create language select option and function
- 5.Create middleware

## Step-by-Step Instructions

### 1. Download Fresh Laravel Project

```bash
composer create-project --prefer-dist laravel/laravel multi-language-laravel
cd multi-language-laravel
```

## 2. Create Language Folder and Assign Text Inside Resources Folder
Create a lang folder inside the resources directory. Inside resources/lang, create subdirectories for each language you want to support (e.g., en for English, bn for Bangla, fr for French).

Open content.php file from each directory and paste bellow code.

resources/lang/bn/conent.php 
```
<?php

return [
    'heading' => 'আমরা দেখব কিভাবে মোল্লা মেহেদীর সাথে লারাভেলের একাধিক ভাষা ব্যবহার করা যায়'
];
```
resources/lang/en/conent.php 
```
<?php

return [
    'heading' => 'We will see how to use multiple languages ​​in Laravel with Molla Mehedi'
];
```
resources/lang/fr/conent.php 
```
<?php

return [
    'heading' => 'Nous verrons comment utiliser plusieurs langues dans Laravel avec Molla Mehedi',
];
```

## 3. Create Route, Controller, and Assign Function
Generate a new controller and define functions for language handling:
```
php artisan make:controller LanguageController
```
Define routes in web.php:
```
<?php

use App\Http\Controllers\LangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/change', [LangController::class, 'lang_change'])->name('lang.change');


```
 Create Language Select Option and Function
```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('lang_code',$request->lang);
        return redirect()->back();
    }
}
```

## 4 .create language select option and function 
 put the html code  inside views folder  welcome.blade
```
<!DOCTYPE html>
<html>
<head>
    <title> Laravel Multiple Language With Molla Mehedi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
      
        <div class="row">
            <div class="col-md-8 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('logo.jpg') }}" alt="">
                        <h2>Laravel Multiple Language With Molla Mehedi</h2>
                    </div>
               
                <div class="card-body">
                    <strong>Select Language: </strong>
                    <select class="form-control lang-change">
                        <option value="en" {{ session()->get('lang_code')=='en' ? 'selected' : ''}}>English</option>
                        <option value="fr" {{ session()->get('lang_code')=='fr' ? 'selected' : ''}}>French</option>
                        <option value="bn" {{ session()->get('lang_code')=='bn' ? 'selected' : ''}}>Bengali</option>
                    </select>
                <h4 class="mt-5">{{ __('content.heading') }}</h4>
                </div>
                <div class="card-footer">
                    <h4 class="mt-5">Support</h4>
                    <strong>Email : </strong> <a href="mailto:mollameehedi@gmail.com">mollameehedi@gmail.com</a>
                    <br/>
                    <strong>Website : </strong><a href=" mlmehedi.com"> mlmehedi.com</a>
                </div>
            </div>
            </div>
        </div>
     
    </div>
</body>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
 
  var url = "{{ route('lang.change') }}";

    $('.lang-change').change(function(){
     let lang_code = $(this).val();
      window.location.href = url + "?lang="+ lang_code;
    });

</script>
</html>
```

## 5.Create middleware
Create a middleware to handle language switching globally:
```
php artisan make:middleware LangMiddleware
```
Assign Condition
```
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('lang_code')){
            App::setLocale(session()->get('lang_code'));
        }
        return $next($request);
    }
}
```
# Register the middleware in app/Http/Kernel.php:

```
protected $middlewareGroups = [
    'web' => [
        // Other middleware...
        \App\Http\Middleware\LangMiddleware::class,
    ],
];
```

Ok Now run artisan server using the bellow command and test your app.
```
php artisan serve
 
```
Paste this URL in the browser http://127.0.0.1:8000

 

 

Hope this will help you. Thanks




