<?php

namespace App\Providers;

use App\Http\View\Composers\MenuViewComposer;
use App\Http\View\Composers\OtherVacanciesComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {

        View::composer('frontend.includes.header', MenuViewComposer::class);
        View::composer('frontend.vacancies.show', OtherVacanciesComposer::class);
        View::composer('frontend.vacancies.apply', OtherVacanciesComposer::class);
        Blade::directive('limitText', function ($expression) {
            list($text, $limit) = explode(',', $expression);
            return "<?php echo strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text; ?>";
        });
        Paginator::useBootstrap();
    }
}
