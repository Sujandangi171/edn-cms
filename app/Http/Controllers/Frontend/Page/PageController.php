<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\System\Company;
use App\Models\System\Content;
use App\Models\System\Menu;
use App\Models\System\Popup;
use App\Models\System\Process;
use App\Models\System\Service;
use App\Models\System\Slider;
use App\Models\System\Testimonial;

class PageController extends Controller
{
    protected $menu, $content, $service, $company, $slider, $testimonial, $process, $popup;

    public function __construct(
        Menu $menu,
        Content $content,
        Service $service,
        Company $company,
        Slider $slider,
        Testimonial $testimonial,
        Process $process,
        Popup $popup
    ) {
        $this->menu = $menu;
        $this->content = $content;
        $this->service = $service;
        $this->company = $company;
        $this->slider = $slider;
        $this->testimonial = $testimonial;
        $this->process = $process;
        $this->popup = $popup;
    }
    public function index()
    {
        $aboutPageId = $this->menu->where('href', 'about')->value('id');
        $whyUsPageId = $this->menu->where('href', 'why-us')->value('id');
        $whyUsPageId = $this->menu->where('href', 'why-us')->value('id');
        $careerPageId = $this->menu->where('href', 'career')->value('id');
        $data = [
            'about' => $this->content->where('menu_id', $aboutPageId)->first(),
            'services' => $this->service->active()->rank()->take(6)->get(),
            'clients' => $this->getCompanyDetail('client'),
            'partners' => $this->getCompanyDetail('partner'),
            'sliders' => $this->slider->active()->rank()->get(),
            'testimonials' => $this->testimonial->rank()->active()->get(),
            'processes' => $this->process->rank()->active()->get(),
            'whyUs' => $this->content->where('menu_id', $whyUsPageId)->first(),
            'career' => $this->content->where('menu_id', $careerPageId)->first(),
            'popups' => $this->popup->active()->get(),
        ];

        return view('frontend.home.index', $data);
    }

    public function getCompanyDetail($type)
    {
        return $this->company
            ->where('company_type', $type)
            ->active()
            ->rank()
            ->get();
    }

    public function index2()
    {
        return view('includes.header2');
    }

    public function vacancies()
    {
        return view('frontend.join');
    }
    public function careerDetail()
    {
        return view('frontend.career-detail');
    }
    public function careerForm()
    {
        return view('frontend.career-form');
    }

    public function test()
    {
        dd('');
    }
}
