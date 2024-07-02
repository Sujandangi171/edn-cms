<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\Menu\MenuController;
use App\Http\Controllers\System\Role\RoleController;
use App\Http\Controllers\System\User\UserController;
use App\Http\Controllers\System\Auth\LoginController;
use App\Http\Controllers\System\Config\ConfigController;
use App\Http\Controllers\System\Module\ModuleController;
use App\Http\Controllers\System\Company\ClientController;
use App\Http\Controllers\System\Content\ContentController;
use App\Http\Controllers\System\Profile\ProfileController;
use App\Http\Controllers\System\Service\ServiceController;
use App\Http\Controllers\System\Category\CategoryController;
use App\Http\Controllers\System\LoginLog\LoginLogController;
use App\Http\Controllers\System\Content\ContentTypeController;
use App\Http\Controllers\System\Dashboard\DashboardController;
use App\Http\Controllers\System\Permission\PermissionController;
use App\Http\Controllers\System\ActivityLog\ActivityLogController;
use App\Http\Controllers\System\Applicant\ApplicantController;
use App\Http\Controllers\System\Company\PartnerController;
use App\Http\Controllers\System\EmailTemplate\EmailTemplateController;
use App\Http\Controllers\System\Enquiry\EnquiryController;
use App\Http\Controllers\System\Localization\LocalizationController;
use App\Http\Controllers\System\Process\ProcessController;
use App\Http\Controllers\System\Setting\SettingController;
use App\Http\Controllers\System\Slider\SliderController;
use App\Http\Controllers\System\Vacancy\VacancyController;
use App\Http\Controllers\System\Testimonial\TestimonialController;

Route::group(['prefix' => 'system/'], function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form')->middleware('checkIfLoggedIn');
        Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('loginLogs');
        Route::get('/set-password', [LoginController::class, 'setPasswordForm'])->name('login.setPasswordForm');
        Route::post('/set-password', [LoginController::class, 'setPassword'])->name('login.setPassword');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        //Forgot Password
        Route::get('/forgot-password', 'System\Profile\ProfileController@forgotPasswordForm')->name('forgotPasswordForm');
        Route::post('/forgot-password', 'System\Profile\ProfileController@forgotPassword')->name('forgotPassword');

        //Reset Password
        Route::get('/reset-password/{token}', [ProfileController::class, 'resetPasswordForm']);
        Route::post('/reset-password', [ProfileController::class, 'resetPassword'])->name('resetPassword');


        Route::group(['middleware' => ['systemAuth', 'checkRolePermission']], function () {
                Route::get('/home', [DashboardController::class, 'index'])->name('home.index');
                Route::get('/locale/{lang}', [LocalizationController::class, 'setLanguage'])->name('set-language');

                //Profile
                Route::get('/my-profile', [ProfileController::class, 'viewProfile'])->name('my-profile');
                Route::get('/update-profile-form', [ProfileController::class, 'updateProfileForm'])->name('update-profile-form');
                Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
                Route::get('/update-password-form', [ProfileController::class, 'updatePasswordForm'])->name('update-password-form');
                Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update-password');

                //Menu
                Route::resource('/menus', MenuController::class);
                Route::get('/get-menu-info', [MenuController::class, 'getMenuInfo'])->name('get-menu-info');

                //Config
                Route::resource('/configs', ConfigController::class);

                //Activity Log
                Route::resource('/activity-logs', ActivityLogController::class);

                //Category
                Route::resource('/categories', CategoryController::class);

                //Category
                Route::resource('/login-logs', LoginLogController::class);

                //User
                Route::resource('/users', UserController::class);
                Route::get('/users/change-status/{id}', [UserController::class, 'changeStatus']);
                Route::get('/resend-password/{id}', [UserController::class, 'resendPassword'])->name('resendPassword');
                Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

                //Role
                Route::resource('/roles', RoleController::class);

                //Permission
                Route::resource('/permissions', PermissionController::class);

                //Module
                Route::resource('/modules', ModuleController::class);

                //Content Types 
                Route::resource('/content-types', ContentTypeController::class);
                Route::get('/content-types/change-status/{id}', [ContentTypeController::class, 'changeStatus']);

                //Content
                Route::resource('/contents', ContentController::class);

                //Services
                Route::resource('/services', ServiceController::class);
                Route::get('/services/change-status/{id}', [ServiceController::class, 'changeStatus']);

                //Partners
                Route::resource('/partners', PartnerController::class);
                Route::get('/partners/change-status/{id}', [PartnerController::class, 'changeStatus']);

                //Clients
                Route::resource('/clients', ClientController::class);
                Route::get('/clients/change-status/{id}', [ClientController::class, 'changeStatus']);

                //Sliders
                Route::resource('/sliders', SliderController::class);
                Route::get('/sliders/change-status/{id}', [SliderController::class, 'changeStatus']);

                //Vacancies
                Route::resource('/vacancies', VacancyController::class);
                Route::get('/vacancies/change-status/{id}', [VacancyController::class, 'changeStatus']);

                //Testimonials
                Route::resource('/testimonials', TestimonialController::class);
                Route::get('/testimonials/change-status/{id}', [TestimonialController::class, 'changeStatus']);

                //Settings
                Route::resource('/settings', SettingController::class);

                //Applicants
                Route::resource('/applicants', ApplicantController::class);
                Route::get('export-resumes', [ApplicantController::class, 'exportResume'])->name('exportResume');

                //Enquiry
                Route::resource('/enquiries', EnquiryController::class);

                //Process
                Route::resource('/processes', ProcessController::class);
                Route::get('/processes/change-status/{id}', [ProcessController::class, 'changeStatus']);

                //Process
                Route::resource('/email-templates', EmailTemplateController::class);
                Route::get('/email-templates/change-status/{id}', [EmailTemplateController::class, 'changeStatus']);
        });
});
