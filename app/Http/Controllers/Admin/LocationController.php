<?php

namespace App\Http\Controllers\Admin;

use App\Enum\CityEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CityLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = CityLocation::with('city')->orderBy('order', 'asc')->get();
        return view('admin.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $cities = City::where('is_active', CityEnum::IS_ACTIVE)->get();
        return view('admin.location.create-edit', compact('cities',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:city_locations',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!City::find($data['city_id']))
            return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active');
        $data['is_popular'] = $request->has('is_popular');
        $data['is_airport'] = $request->has('is_airport');
        $create = CityLocation::create($data);
        if ($create) {
            return redirect()->route('admin.location.index')->with('success', 'Başarılı bir şekilde ekleme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
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
    public function edit(CityLocation $location)
    {
        $cities = City::where('is_active', CityEnum::IS_ACTIVE)->get();
        return view('admin.location.create-edit', compact('location', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CityLocation $location)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:city_locations,name,'.$location->id,
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!City::find($data['city_id']))
            return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
        $data['slug'] = Str::slug($data['name']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;
        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;
        $data['is_airport'] = $request->has('is_airport') ? 1 : 0;
        if ($location->update($data)) {
            return redirect()->route('admin.location.index')->with('success', 'Başarılı bir şekilde güncelleme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = CityLocation::findOrFail($id);
        if ($location->delete()) {
            return redirect()->route('admin.location.index')->with('success', 'Başarılı bir şekilde silme işlemi gerçekleştirildi.');
        }
        return back()->with('error', 'Bir hata oluştu. Lütfen tekrar deneyiniz.');
    }

    public function orderLocation(Request $request)
    {
        foreach ($request->order as $key => $value) {
            CityLocation::where('id', $value)->update(['order' => $key]);
        }
        return response()->json(['success' => true], 200);

    }
}
