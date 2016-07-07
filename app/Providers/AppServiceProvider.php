<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \View::composer('admin.column.layout', 'App\Composers\ColumnProvider');
    }
    public function register()
    {
//        if($this->app->environment('local')) {
//            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
//        }
    }
}
