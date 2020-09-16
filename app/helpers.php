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
        return App\Models\Category::active()->get();
    }
}
