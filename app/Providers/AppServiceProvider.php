<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Member;
use Illuminate\Support\Facades\View;
// use Spatie\FlareClient\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $data = DB::table('members')->select('members.*')->get();
        // View::share('users',$data);
    }
}
