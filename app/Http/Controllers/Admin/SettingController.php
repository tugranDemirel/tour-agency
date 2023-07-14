<?php

namespace App\Http\Controllers\Admin;

use App\Enum\LanguageEnum;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Seo;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        $seo = Seo::first()->getTranslations();
        return view('admin.setting.index', compact('setting', 'languages', 'seo'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|max:2048',
            'favicon' => 'nullable|max:2048',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ],[
            'title.required' => 'Title is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
        ]);
        if ($request->logo) {
            $name = time().'logo.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['logo'] = $path;
        }

        if ($request->favicon) {
            $name = time().'favicon.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['favicon'] = $path;
        }
        if ($request->contact_image) {
            $name = time().'contact_image.' . $request->contact_image->getClientOriginalExtension();
            $request->contact_image->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['contact_image'] = $path;
        }
        $setting = Setting::create($data);

        if ($setting) {
            return redirect()->back()->with('success', 'Ayarlar başarılı bir şekilde güncellendi')->with('setting', $setting);
        }
        return redirect()->back()->with('error', 'Ayarlar güncellenemedi');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'logo' => 'nullable|max:2048',
            'favicon' => 'nullable|max:2048',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ],[
            'title.required' => 'Title is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone is required',
        ]);

        if ($request->logo) {
            $name = time().'logo.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['logo'] = $path;
            //unlink($setting->logo);
        }

        if ($request->favicon) {
            $name = time().'favicon.' . $request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['favicon'] = $path;
            unlink($setting->favicon);
        }
        if ($request->contact_image) {
            $name = time().'contact_image.' . $request->contact_image->getClientOriginalExtension();
            $request->contact_image->move(public_path('images'), $name);
            $path = 'public/images/'.$name;
            $data['contact_image'] = $path;
        }
        $update  = $setting->update($data);
        if ($update) {
            return redirect()->back()->with('success', 'Ayarlar başarılı bir şekilde güncellendi')->with('setting', $setting);
        }
        return redirect()->back()->with('error', 'Ayarlar güncellenemedi');
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
