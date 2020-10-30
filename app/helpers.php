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
