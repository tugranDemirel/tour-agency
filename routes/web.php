<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\CarTypeController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CityLocationCarPriceController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PrivateServiceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AppointmentController;

Route::as('front.')->middleware('localize')->group(function (){
    Route::post('locale', [FrontController::class, 'locale'])->name('locale');
    Route::get('/', [FrontController::class, 'index'])->name('index');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/car/{cityLocationCarPrice}/detail', [FrontController::class, 'singleTour'])->name('single_tour');
    Route::post('/car/{cityLocationCarPrice}/comment', [FrontController::class, 'storeComment'])->name('store_comment');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/service/{service}', [FrontController::class, 'service'])->name('service');
    Route::get('private-service', [FrontController::class, 'privateService'])->name('private_service');
    Route::post('private-service', [FrontController::class, 'storePrivateService'])->name('store_private_service');
    Route::get('/faq/', [FrontController::class, 'faq'])->name('faq');
    Route::get('appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('appointment/', [AppointmentController::class, 'to'])->name('appointment.to');
    Route::get('appointment/payment/', [AppointmentController::class, 'payment'])->name('appointment.payment');
    Route::post('appointment/', [AppointmentController::class, 'store'])->name('appointment.store');
    /*Route::get('sitemap', function (){
        $sitemap = \Spatie\Sitemap\Sitemap::create()
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.index')))
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.search')))
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.contact')))
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.about')))
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.private_service')))
            ->add(\Spatie\Sitemap\Tags\Url::create(route('front.faq')));

        \App\Models\Service::all()->each(function ($project) use ($sitemap){
            $sitemap->add(\Spatie\Sitemap\Tags\Url::create(route('front.service', $project->id)));
        });
        if (is_file(public_path('sitemap.xml'))){
            unlink(public_path('sitemap.xml'));
        }
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $sleeper = \Illuminate\Support\Facades\Http::get('https://www.google.com/ping?sitemap='.url('sitemap.xml'));
        if ($sleeper->successful()) {
            echo 'Google Arama Konsolu başarıyla bilgilendirildi.\n';
        } else {
            echo 'Google Arama Konsolunu bilgilendirme başarısız oldu.'. ' '. $sleeper->status().' \n';
        }
        sleep(1);
        echo 'Anasayfaya yönlendiriliyorsunuz.';
        sleep(5);
        return redirect()->route('admin.home');


    })->name('sitemap');*/
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->as('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/main-config', [DashboardController::class, 'mainConfig'])->name('main_config');
    Route::post('/main-config', [DashboardController::class, 'mainConfigUpdate'])->name('main_config_update');
    Route::resource('setting', SettingController::class)->only(['index', 'store','update']);
    Route::resource('seo', SeoController::class)->only(['store']);
    Route::resource('location', LocationController::class)->only(['index','create' ,'edit','store','update', 'destroy']);
    Route::resource('car', CarController::class)->only(['index','create' ,'edit','store','update', 'destroy']);
    Route::resource('car-type', CarTypeController::class)->only(['index','create' ,'edit','store','update', 'destroy']);
    Route::resource('car-model', CarModelController::class)->only(['index','create' ,'edit','store','update', 'destroy']);
    Route::resource('pricing', CityLocationCarPriceController::class)->only(['index','create' ,'edit','store', 'update', 'destroy']);
    Route::resource('comment', CommentController::class)->only(['index','create' ,'edit', 'update', 'destroy']);
    Route::resource('service', ServiceController::class)->only(['index','create', 'store' ,'edit', 'update', 'destroy']);
    Route::resource('about', AboutController::class)->only(['index','create','store', 'update']);
    Route::resource('contact', ContactController::class)->only(['index', 'show', 'store']);
    Route::resource('faq', FaqController::class)->only(['index','create', 'store','edit', 'update', 'destroy']);
    Route::resource('private-service', PrivateServiceController::class)->only(['index','show']);
    Route::resource('appointment', \App\Http\Controllers\Admin\AppointmentController::class)->only(['index','show']);
    Route::resource('language', LanguageController::class)->only(['index','create', 'store','edit', 'update', 'destroy']);
    Route::post('ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
    Route::get('order-location', [LocationController::class, 'orderLocation'])->name('order_location');
});
