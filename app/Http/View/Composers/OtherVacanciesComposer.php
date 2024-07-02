<?php

namespace App\Http\View\Composers;

use App\Models\System\Menu;
use App\Services\Frontend\Vacancy\VacancyService;
use Illuminate\View\View;

class OtherVacanciesComposer
{
    protected $vacancyService;

    public function __construct(VacancyService $vacancyService)
    {
        $this->vacancyService = $vacancyService;
    }

    public function compose(View $view)
    {
        $url = request()->segment(2);
        if ($url === 'apply') {
            $slug = request()->segment(3);
        } else {
            $slug = request()->segment(2);
        }
        $otherVacancies = $this->vacancyService->getOtherVacancies($slug, 3);
        $view->with(compact('otherVacancies'));
    }
}
