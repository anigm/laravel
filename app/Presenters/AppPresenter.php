<?php namespace App\Presenters;
use Route;
class AppPresenter
{
    public function activeMenuByRoute($name = null)
    {
        $currentRouteName = Route::currentRouteName();
        $routeSections = explode('.', $currentRouteName);
        if(isset($routeSections[1]) && $routeSections[1] === $name)
        {
            return 'active';
        }
        return '';
    }
}