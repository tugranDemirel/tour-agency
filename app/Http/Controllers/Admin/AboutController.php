<?php

namespace App\Http\Controllers\Admin;

use App\Enum\LanguageEnum;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Language;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        $main = About::where('id', 1)->first();
        $about = $main->getTranslations();
        return view('admin.about.create-edit', compact('languages', 'about', 'main'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'premium_text' => 'required',
            'customer_text' => 'required',
            'support_text' => 'required',
            'language_text' => 'required',
            'accessibility_text' => 'required',
            'pet_allow_text' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'banner_title' => 'required',
            'banner_text' => 'required',
        ]);
        $data['image'] = self::uploadImage($request->image, 'about/');
        $data['banner_image'] = self::uploadImage($request->banner_image, 'about/banner/');

        $create = About::create($data);
        if ($create)
            return redirect()->back()->with('success', 'Hakkımızda Sayfası başarılı bir şekilde oluşturuldu');
        return redirect()->back()->with('error', 'Hakkımızda sayfası başarılı bir şekilde oluşturulamadı. Lütfen tekrar deneyiniz.');
    }

    public function update(Request $request, About $about)
    {

        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'premium_text' => 'required',
            'customer_text' => 'required',
            'support_text' => 'required',
            'language_text' => 'required',
            'accessibility_text' => 'required',
            'pet_allow_text' => 'required',
            'mission' => 'required',
            'vision' => 'required',
            'banner_title' => 'required',
            'banner_text' => 'required',
        ]);
        if ($request->image)
            $data['image'] = self::uploadImage($request->image, 'about/', $about->image);
        if ($request->banner_image)
            $data['banner_image'] = self::uploadImage($request->banner_image, 'about/banner/', $about->banner_image);

        $update = $about->update($data);
        if ($update)
            return redirect()->back()->with('success', 'Hakkımızda Sayfası başarılı bir şekilde güncellendi');
        return redirect()->back()->with('error', 'Hakkımızda sayfası başarılı bir şekilde güncellenemedi. Lütfen tekrar deneyiniz.');
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
