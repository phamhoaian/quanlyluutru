<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notice;
use Carbon\Carbon;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $notices = Notice::where('read_flg', 0)->orderBy('created_at', 'DESC')->take(5)->get();
        $count_notices = Notice::where('read_flg', 0)->count();
        View::share('notices', $notices);
        View::share('count_notices', $count_notices);
        Carbon::setLocale('vi');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
