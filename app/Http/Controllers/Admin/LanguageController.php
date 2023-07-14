<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.language.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:languages,name',
            'locale' => 'required|string|max:255|unique:languages,locale',
        ]);

        $data['is_active'] = $request->has('is_active') ? true : false;

        $create = Language::create($data);
        if ($create)
            return redirect()->route('admin.language.index')->with('success', 'Dil başarılı bir şekilde oluşturuldu');
        else
            return redirect()->route('admin.language.index')->with('error', 'Dil oluşturulurken bir hata oluştu');

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('admin.language.create-edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:languages,name,' . $language->id,
            'locale' => 'required|string|max:255|unique:languages,locale,' . $language->id,
        ]);
        $data['is_active'] = $request->has('is_active') ? true : false;

        $update = $language->update($data);
        if ($update)
            return redirect()->route('admin.language.index')->with('success', 'Dil başarılı bir şekilde güncellendi');
        else
            return redirect()->route('admin.language.index')->with('error', 'Dil güncellenirken bir hata oluştu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $language = Language::findOrFail($id);
        $delete = $language->delete();
        if ($delete)
            return redirect()->route('admin.language.index')->with('success', 'Dil başarılı bir şekilde silindi');
        else
            return redirect()->route('admin.language.index')->with('error', 'Dil silinirken bir hata oluştu');
    }
}
