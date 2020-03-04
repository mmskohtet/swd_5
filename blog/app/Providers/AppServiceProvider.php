<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $categories = ["Myanmar","English","China"];
        $skill = ["HTML","CSS","JavaScript","PHP","SQL"];
        $division = ["yangon","mandalay","nay pyi taw","maw la myine"];

        View::share("categories",$categories);
        View::share("skill",$skill);
        View::share("division",$division);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
