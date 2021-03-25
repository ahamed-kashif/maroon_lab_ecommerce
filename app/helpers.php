<?php


if (!function_exists('title')) {
    function title($title = null)
    {
        if (!empty($title)) {
            return $title . " - " . config('app.name');
        }

        return config('app.name');
    }
}
if (!function_exists('categories')) {
    function categories()
    {
        return App\Models\Category::with('subcategories')->active()->get();
    }
}
if (!function_exists('sale_products')) {
    function sale_products()
    {
        return App\Models\Product::with('categories')->active()->where('discounted_price','!=',null)->get();
    }
}
if (!function_exists('featured_products')) {
    function featured_products()
    {
        return App\Models\Product::with('categories')->active()->where('is_featured','=',1)->get();
    }
}
if (!function_exists('all_products')) {
    function all_products()
    {
        return App\Models\Product::with('categories')->active()->get();
    }
}

/**** new addition **/
if (!function_exists('bigLogoUrl')) {
    function bigLogoUrl()
    {
        return env('APP_URL').'/logo/logo.png';
    }
}
if (!function_exists('smallLogoUrl')) {
    function smallLogoUrl()
    {
        return env('APP_URL').'/logo/logo_1.png';
    }
}
