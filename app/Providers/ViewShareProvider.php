<?php

namespace App\Providers;

use App\Enum\CityEnum;
use App\Enum\CityLocationCarPriceEnum;
use App\Enum\CityLocationEnum;
use App\Enum\LanguageEnum;
use App\Enum\ServiceEnum;
use App\Models\About;
use App\Models\CityLocation;
use App\Models\CityLocationCarPrice;
use App\Models\Language;
use App\Models\MainConfig;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $cityLocations = CityLocation::where('is_active', CityLocationEnum::IS_ACTIVE)
                                ->with(['city' => function($query){
                                    $query->where('is_active', CityEnum::IS_ACTIVE);
                                }])
                                ->orderBy('order', 'asc')
                                ->get();
            view()->share('_cityLocations', $cityLocations);

            $setting = Setting::where('id', 1)->first();
            view()->share('_setting', $setting);

            $popularLocations = CityLocationCarPrice::where('is_active', CityLocationCarPriceEnum::IS_ACTIVE)
                                    ->with(['cityLocation' => function($query){
                                        $query->where('is_active', CityLocationEnum::IS_ACTIVE)
                                            ->where('is_popular', CityLocationEnum::IS_POPULAR)
                                            ->with(['city' => function($query){
                                                $query->where('is_active', CityEnum::IS_ACTIVE);
                                            }]);
                                    }])
                                    ->get();
            view()->share('_popularLocations', $popularLocations);

            $mainConfig = MainConfig::where('id', 1)->first();
            view()->share('_mainConfig', $mainConfig);

            $langs = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
            view()->share('_langs', $langs);

            $seo = Seo::where('id', 1)->first();
            view()->share('_seo', $seo);

            $services = Service::where('is_active', ServiceEnum::IS_ACTIVE)->select('id', 'title', 'slug')->get();
            view()->share('_services', $services);

            $about = About::where('id', 1)->select('mission', 'vision')->first();
            view()->share('_about', $about);
        });
    }
}
