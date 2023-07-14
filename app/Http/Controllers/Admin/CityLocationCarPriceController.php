<?php

namespace App\Http\Controllers\Admin;

use App\Enum\CarEnum;
use App\Enum\CityLocationEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\CityLocation;
use App\Models\CityLocationCarPrice;
use Illuminate\Http\Request;

class CityLocationCarPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricings = CityLocationCarPrice::with(['car' => function($q){
            return $q->with(['carModel' => function($q){
                return $q->with('carType');
            }]);
        }, 'cityLocation'])->get();
        return view('admin.pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('is_active', CarEnum::IS_ACTIVE)->get();
        $locaitons = CityLocation::where('is_active', CityLocationEnum::IS_ACTIVE)->get();
        return view('admin.pricing.create-edit', compact('cars', 'locaitons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'city_location_id' => 'required|exists:city_locations,id',
           'parent_city_location_id' => 'required|exists:city_locations,id',
            'car_id' => 'required|exists:cars,id',
            'person_count' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $data['is_active'] = $request->has('is_active') ? CarEnum::IS_ACTIVE : CarEnum::IS_NOT_ACTIVE;

        $create = CityLocationCarPrice::create($data);
        if ($create) {
            return redirect()->route('admin.pricing.index')->with('success', 'Fiyatlandırma başarılı bir şekilde eklendi');
        }
        return redirect()->back()->with('error', 'Fiyatlandırma eklenirken bir hata oluştu');
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
    public function edit(CityLocationCarPrice $pricing)
    {
        $cars = Car::where('is_active', CarEnum::IS_ACTIVE)->get();
        $locaitons = CityLocation::where('is_active', CityLocationEnum::IS_ACTIVE)->get();
        return view('admin.pricing.create-edit', compact('cars', 'locaitons', 'pricing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityLocationCarPrice $pricing)
    {
        $data = $request->validate([
            'city_location_id' => 'required|exists:city_locations,id',
            'parent_city_location_id' => 'required|exists:city_locations,id',
            'car_id' => 'required|exists:cars,id',
            'person_count' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $data['is_active'] = $request->has('is_active') ? CarEnum::IS_ACTIVE : CarEnum::IS_NOT_ACTIVE;
        if ($pricing->update($data)) {
            return redirect()->route('admin.pricing.index')->with('success', 'Fiyatlandırma başarılı bir şekilde güncellendi');
        }
        return redirect()->back()->with('error', 'Fiyatlandırma güncellenirken bir hata oluştu');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = CityLocationCarPrice::findOrFail($id);
        if ($location->delete()) {
            return redirect()->route('admin.pricing.index')->with('success', 'Başarılı bir şekilde silme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
    }
}
