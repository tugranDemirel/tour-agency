<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carTypes = CarType::all();
        return view('admin.car-type.index', compact('carTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.car-type.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name',
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $carType = CarType::create($data);
        if ($carType) {
            return redirect()->route('admin.car-type.index')->with('success', 'Başarılı bir şekilde oluşturuldu');
        }
        return redirect()->route('admin.car-type.index')->with('error', 'Bir hata oluştu');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarType $carType)
    {
        return view('admin.car-type.create-edit', compact('carType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarType $carType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:car_types,name,' . $carType->id,
        ]);

        $data['slug'] = Str::slug($data['name']);
        $data['status'] = $request->has('status') ? 1 : 0;

        $carType->update($data);
        if ($carType) {
            return redirect()->route('admin.car-type.index')->with('success', 'Başarılı bir şekilde güncellendi');
        }
        return redirect()->route('admin.car-type.index')->with('error', 'Bir hata oluştu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carType = CarType::findOrFail($id);
        if ($carType->delete()) {
            return redirect()->route('admin.location.index')->with('success', 'Başarılı bir şekilde silme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
    }
}
