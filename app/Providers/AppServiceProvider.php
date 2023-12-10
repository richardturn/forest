<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Blade::directive(
            'number',
            function ($value) {
                return "<?php echo number_format($value); ?>";
            }
        );

        Blade::directive(
            'time',
            function ($time) {
                return "<?php echo $time ?  \Carbon\Carbon::parse($time)->format('H:i') : 'N/A'; ?>";
            }
        );

    }
}
