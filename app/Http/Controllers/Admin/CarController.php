<?php

namespace App\Http\Controllers\Admin;

use App\Enum\CarEnum;
use App\Enum\LanguageEnum;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarController extends Controller
{
    private $_path = 'cars/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with(['carModel' => function($query){
            $query->with('carType');
        }])->get();
        return view('admin.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        $carModels = CarModel::all();
        return view('admin.car.create-edit', compact('carModels', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cars,name',
            'description.*' => 'required|string',
            'car_model_id' => 'required|exists:car_models,id',
            'image' => 'required|max:2048'
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active') ? CarEnum::IS_ACTIVE : CarEnum::IS_NOT_ACTIVE;
        $data['image'] = self::uploadImage($request->image, $this->_path);
        $car = Car::create($data);
        if ($car) {
            return redirect()->route('admin.car.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
        return redirect()->route('admin.car.index')->with('error', 'Bir hata oluştu');
    }

    public function edit(Car $car)
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        $carModels = CarModel::all();
        return view('admin.car.create-edit', compact('carModels', 'car', 'languages'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:cars,name,'.$car->id,
            'color.*' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'km' => 'required|string|max:255',
            'door' => 'required|string|max:255',
            'description.*' => 'required|string',
            'car_model_id' => 'required|exists:car_models,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active') ? CarEnum::IS_ACTIVE : CarEnum::IS_NOT_ACTIVE;
        if ($request->hasFile('image')) {
            $data['image'] = self::uploadImage($request->image, $this->_path,$car->image);
        }
        if ($car->update($data)) {
            return redirect()->route('admin.car.index')->with('success', 'Başarılı bir şekilde güncellendi');
        }
        return redirect()->route('admin.car.index')->with('error', 'Bir hata oluştu');
    }

    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        if ($car->delete()) {
            return redirect()->route('admin.car.index')->with('success', 'Başarılı bir şekilde silme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
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
