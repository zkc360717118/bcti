<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        var_dump('只有下面的regiser方法能启动的情况下，这里才能启动');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        var_dump('第一个启动');
    }
}
