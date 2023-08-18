<?php

namespace App\Http\Controllers\Admin;

use App\Enum\LanguageEnum;
use App\Enum\ServiceEnum;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ServiceController extends Controller
{

    private $_path = 'services/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        return view('admin.service.create-edit', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // hata benim route den kaynaklı
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'banner_image' => 'required',
            'banner_title' => 'required',
            'banner_text' => 'required',
            'description' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $tr = new GoogleTranslate();
        $sourceTr = $tr->setSource('tr');

        $trData = [];
        foreach ($this->getLanguages() as $language)
        {
            $trData['title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['title']);
            $trData['slug'][$language->locale] = $tr->setTarget($language->locale)->translate(Str::slug($data['title']));
            $trData['banner_title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['banner_title']);
            $trData['banner_text'][$language->locale] = $tr->setTarget($language->locale)->translate($data['banner_text']);
            $trData['description'][$language->locale] = $tr->setTarget($language->locale)->translate($data['description']);
            $trData['content'][$language->locale] = $tr->setTarget($language->locale)->translate($data['content']);
            $trData['meta_title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_title']);
            $trData['meta_description'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_description']);
            $trData['meta_keywords'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_keywords']);
        }


        $trData['is_active'] = $request->has('is_active') ? ServiceEnum::IS_ACTIVE : ServiceEnum::IS_NOT_PASSIVE;
        $trData['banner_image'] = self::uploadImage($request->banner_image, $this->_path);

        // veritabanına laydetme yeri
        $service = Service::create($trData);
        if ($service) {
            return redirect()->route('admin.service.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        return view('admin.service.create-edit', compact('languages', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        // hata benim route den kaynaklı
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'banner_title' => 'required',
            'banner_text' => 'required',
            'description' => 'required',
            'content' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $tr = new GoogleTranslate();
        $sourceTr = $tr->setSource('tr');

        $trData = [];
        foreach ($this->getLanguages() as $language)
        {
            $trData['title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['title']);
            $trData['slug'][$language->locale] = $tr->setTarget($language->locale)->translate(Str::slug($data['title']));
            $trData['banner_title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['banner_title']);
            $trData['banner_text'][$language->locale] = $tr->setTarget($language->locale)->translate($data['banner_text']);
            $trData['description'][$language->locale] = $tr->setTarget($language->locale)->translate($data['description']);
            $trData['content'][$language->locale] = $tr->setTarget($language->locale)->translate($data['content']);
            $trData['meta_title'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_title']);
            $trData['meta_description'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_description']);
            $trData['meta_keywords'][$language->locale] = $tr->setTarget($language->locale)->translate($data['meta_keywords']);
        }
        $trData['is_active'] = $request->has('is_active') ? ServiceEnum::IS_ACTIVE : ServiceEnum::IS_NOT_PASSIVE;
        if ($request->hasFile('banner_image')) {
            $trData['banner_image'] = self::uploadImage($request->banner_image, $this->_path, $service->banner_image);
        }

        $service = $service->update($trData);
        if ($service) {
            return redirect()->route('admin.service.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
        return redirect()->route('admin.service.index')->with('error', 'Kaydetme işlemi gerçekleştirilemedi.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service  = Service::where('id', $id)->first();
        if ($service) {
            self::deleteImage($service->banner_image);
            $service->delete();
            return redirect()->route('admin.service.index')->with('success', 'Başarılı bir şekilde silindi');
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

    private function getLanguages()
    {
        return Language::all();
    }
}
