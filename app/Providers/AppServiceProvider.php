<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //use vendor default as default pagination
        Paginator::defaultView('vendor.pagination.default');

        //form directive to use error bag
        Blade::directive('form', function ($expression) {
            return "<?php \$errorBag = \$errors->{$expression} ?>";
        });
        
        //check the current yaer and if the year doesn't match with settings then update the status and year
        $year = date('Y');
        $result_uploading_permission = Setting::whereIn('name', ['mid_result_uploading_permission', 'final_result_uploading_permission', 'test_result_uploading_permission'])->get();

        foreach ($result_uploading_permission as $permission) {
            $permission->year == $year ? '' : $permission->update(['status' => 0]);
            isset($permission->expire_date) && ($permission->expire_date < date('Y-m-d') ? $permission->update(['status' => 0, 'expire_date' => null]) : '');
        }
        //make the settings available in all views
        view()->share('result_uploading_permissions', $result_uploading_permission);
    }
}
