<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DoctorCategory;
use Illuminate\Support\Facades\View;

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
        View::composer('*', function($view)
            {
                
                 $doctorCategories = DoctorCategory::all();
                 $view->with('doctorCategories', $doctorCategories);
                 if(patient()) {
                    $notifications = patient()->notifications()->orderBy('created_at', 'DESC')->limit(7)->get();
                    $view->with('notifications', $notifications);
                 }
                
                
            });
    }
}
