<?php

namespace App\Http\Controllers\Admin;

use App\Enum\LanguageEnum;
use App\Enum\ServiceEnum;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\Request;

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
            'title.*' => 'required',
            'slug.*' => 'required',
            'banner_image' => 'required',
            'banner_title.*' => 'required',
            'banner_text.*' => 'required',
            'description.*' => 'required',
            'content.*' => 'required',
            'meta_title.*' => 'required',
            'meta_description.*' => 'required',
            'meta_keywords.*' => 'required',
        ]);
        // KULLANICIDAN ALDIGIM VERIERI YUKARDA FİLTRELİYORUM YA DA ZORUNLU HALE GETIRIYORUM
        // EGER KULLANICI TAM DOĞRU GIRDIYSE ALTAKİ İŞLEMLERİ YAPACAK AMA HATALI GİRİYOR BUNUN SEBEBI ISE UI TARAFINDA
        // YANİ FORNTENDDE
        // TEK TEK YUKARDAKİ İSİMLERİ INPUTLAR ICERISINDE CONTROL EDECEĞİM
        $data['is_active'] = $request->has('is_active') ? ServiceEnum::IS_ACTIVE : ServiceEnum::IS_NOT_PASSIVE;
        $data['banner_image'] = self::uploadImage($request->banner_image, $this->_path);

        // veritabanına laydetme yeri
        $service = Service::create($data);
        if ($service) {
            return redirect()->route('admin.service.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
            'title.*' => 'required',
            'slug.*' => 'required',
            'banner_title.*' => 'required',
            'banner_text.*' => 'required',
            'description.*' => 'required',
            'content.*' => 'required',
            'meta_title.*' => 'required',
            'meta_description.*' => 'required',
            'meta_keywords.*' => 'required',
        ]);
        // KULLANICIDAN ALDIGIM VERIERI YUKARDA FİLTRELİYORUM YA DA ZORUNLU HALE GETIRIYORUM
        // EGER KULLANICI TAM DOĞRU GIRDIYSE ALTAKİ İŞLEMLERİ YAPACAK AMA HATALI GİRİYOR BUNUN SEBEBI ISE UI TARAFINDA
        // YANİ FORNTENDDE
        // TEK TEK YUKARDAKİ İSİMLERİ INPUTLAR ICERISINDE CONTROL EDECEĞİM
        $data['is_active'] = $request->has('is_active') ? ServiceEnum::IS_ACTIVE : ServiceEnum::IS_NOT_PASSIVE;
        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = self::uploadImage($request->banner_image, $this->_path, $service->banner_image);
        }
        // veritabanına laydetme yeri
        $service = $service->update($data);
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
}
