<?php

use App\Http\Controllers\Frontend\Enquiry\EnquiryController;
use App\Http\Controllers\Frontend\State\StateController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Frontend\Vacancy\VacancyController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontend.', 'middleware' => 'uniqueVisitorCount'], function () {
    // Page
    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/career-detail', [PageController::class, 'careerDetail']);
    Route::get('/career-form', [PageController::class, 'careerForm']);

    //Vacancy
    Route::resource('/vacancies', VacancyController::class)->only('index', 'show');
    Route::get('/vacancy/apply/{slug}', [VacancyController::class, 'applyVacancyForm'])->name('applyVacancyForm');
    Route::post('/vacancy/apply', [VacancyController::class, 'applyVacancy'])->name('apply');
    Route::get('/vacancy/interested/{jobType}', [VacancyController::class, 'interestedApplicant'])->name('vacancy.interested');

    //Enquiry
    Route::resource('/enquiries', EnquiryController::class);

    //States
    Route::get('/getProvinces', [StateController::class, 'getProvinces'])->name('getProvinces');
    Route::get('/getDistrictByProvince', [StateController::class, 'getDistrictByProvince'])->name('getDistrictByProvince');
    Route::get('/getMunicipalityByDistrict', [StateController::class, 'getMunicipalityByDistrict'])->name('getMunicipalityByDistrict');
});
