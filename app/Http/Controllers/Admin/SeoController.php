<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meta_title.*' => 'required|string|max:255',
            'meta_description.*' => 'required|string|max:160',
            'meta_keywords.*' => 'required|string|max:155',
        ],[
            'meta_title.*.required' => 'Başlık alanı zorunludur.',
            'meta_description.*.required' => 'Açıklama alanı zorunludur.',
            'meta_keywords.*.required' => 'Anahtar kelime alanı zorunludur.',
            'meta_title.*.max' => 'Başlık alanı en fazla 255 karakter olmalıdır.',
            'meta_description.*.max' => 'Açıklama alanı en fazla 160 karakter olmalıdır.',
            'meta_keywords.*.max' => 'Anahtar kelime alanı en fazla 155 karakter olmalıdır.',
        ]);
        $seo = Seo::first();
        if (!$seo)
        {
            Seo::create([
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
            return redirect()->back()->with('success', 'SEO ayarları başarıyla oluşturuldu.');
        }
        $seo->update([
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->back()->with('success', 'SEO ayarları başarıyla güncellendi.');

    }

}
