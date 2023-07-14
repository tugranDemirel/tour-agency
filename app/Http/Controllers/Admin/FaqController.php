<?php

namespace App\Http\Controllers\Admin;

use App\Enum\FaqEnum;
use App\Enum\LanguageEnum;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();

        return view('admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        return view('admin.faq.create-edit', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);

        $data['is_active'] = $request->has('is_active') ? FaqEnum::IS_ACTIVE : FaqEnum::IS_NOT_ACTIVE;
        $create = Faq::create($data);
        if ($create)
        {
            return redirect()->route('admin.faq.index')->with('success', 'Sıkça Sorulan Soru Başarılı Bir Şekilde Eklendi');
        }
        else
        {
            return redirect()->route('admin.faq.index')->with('error', 'Sıkça Sorulan Soru Eklenirken Bir Hata Oluştu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $languages = Language::where('is_active', LanguageEnum::IS_ACTIVE)->get();
        return view('admin.faq.create-edit', compact('faq', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'question' => 'required|max:255',
            'answer' => 'required',
        ]);
        $data['is_active'] = $request->has('is_active') ? FaqEnum::IS_ACTIVE : FaqEnum::IS_NOT_ACTIVE;
        $update = $faq->update($data);
        if ($update)
        {
            return redirect()->route('admin.faq.index')->with('success', 'Sıkça Sorulan Soru Başarılı Bir Şekilde Güncellendi');
        }
        else
        {
            return redirect()->route('admin.faq.index')->with('error', 'Sıkça Sorulan Soru Güncellenirken Bir Hata Oluştu');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $faq)
    {
        if (Faq::destroy($faq))
        {
            return response()->json([
                'success' => true,
                'message' => 'Sıkça Sorulan Soru Başarılı Bir Şekilde Silindi',
            ], 200); // with
        }
       return response()->json([
           'success' => true,
           'message' => 'Sıkça Sorulan Soru Başarılı Bir Şekilde Silindi',
       ], 400); // with
    }
}
