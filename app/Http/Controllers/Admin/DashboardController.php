<?php

namespace App\Http\Controllers\Admin;

use App\Enum\LanguageEnum;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\MainConfig;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function mainConfig()
    {
        $mainConfig = MainConfig::where('id', 1)->first();
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        return view('admin.main-config.index', compact('mainConfig', 'languages'));
    }

    public function mainConfigUpdate(Request $request)
    {
        try
        {
            $mainConfig = MainConfig::where('id', 1)->first();
            $data = $request->except('_token');

            if ($request->filter_image)
                $data['filter_image'] = self::uploadImage($request->filter_image, 'main-config/', 'filter_image');
            if ($request->video_image)
                $data['video_image'] = self::uploadImage($request->video_image, 'main-config/', 'video_image');
            if ($request->laptop_image)
                $data['laptop_image'] = self::uploadImage($request->laptop_image, 'main-config/', 'laptop_image');
            if ($mainConfig)
            {
                $update = $mainConfig->update($data);
                if ($update) {
                    return redirect()->back()->with('success', 'Anasayfa Ayarları başarılı bir şekilde güncellendi.');
                }
                return redirect()->back()->with('error', 'Anasayfa Ayarları başarılı bir şekilde güncellenemedi.');
            }
            else
            {
                $create = MainConfig::create($data);
                if ($create) {
                    return redirect()->back()->with('success', 'Anasayfa Ayarları başarılı bir şekilde eklendi.');
                }
                return redirect()->back()->with('error', 'Anasayfa Ayarları başarılı bir şekilde eklenemedi.');
            }
        }catch (\Exception $e)
        {
            return redirect()->back()->with('error', 'Anasayfa Ayarları başarılı bir şekilde eklenemedi.');
        }

    }

    public static function uploadImage($image, $path, $oldImage = null)
    {
        if ($oldImage) {
            self::deleteImage($oldImage);
        }
        if (!file_exists(public_path('images/'.$path))) {
            mkdir(public_path('images/'.$path), 0777, true);
        }
        $imageext = $image->extension();
        $imageName = time() . '.' . $imageext;
        $image->move(public_path('images/'.$path), $imageName);
        return 'images/'.$path . $imageName;
    }

    public static function deleteImage($image)
    {
        if (file_exists(public_path($image))) {
            unlink(public_path($image));
        }
    }
}
