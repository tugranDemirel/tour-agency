<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarModelController extends Controller
{
    public function index()
    {
        $carModels = CarModel::with('carType')->get();

        return view('admin.car-model.index', compact('carModels'));
    }

    public function create()
    {
        $carTypes = CarType::all();
        return view('admin.car-model.create-edit',compact('carTypes'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name',
            'car_type_id' => 'required|exists:car_types,id',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $carType = CarModel::create($data);
        if ($carType) {
            return redirect()->route('admin.car-model.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
        return redirect()->route('admin.car-model.index')->with('error', 'Bir hata oluştu');
    }

    public function edit(CarModel $carModel)
    {
        $carTypes = CarType::all();
        return view('admin.car-model.create-edit', compact('carModel','carTypes'));
    }

    public function update(Request $request, CarModel $carModel)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:car_models,name,' .$carModel->id,
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        if ($carModel->update($data)) {
            return redirect()->route('admin.car-model.index')->with('success', 'Başarılı bir şekilde güncellendi');
        }
        return redirect()->route('admin.car-model.index')->with('error', 'Bir hata oluştu');
    }


    public function destroy(string $id)
    {
        $carType = CarModel::findOrFail($id);
        if ($carType->delete()) {
            return redirect()->route('admin.model.index')->with('success', 'Başarılı bir şekilde silme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
    }
}
