<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivateService;
use Illuminate\Http\Request;

class PrivateServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privateServices = PrivateService::all();
        return view('admin.private-service.index', compact('privateServices'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PrivateService $privateService)
    {
        return view('admin.private-service.create-edit', compact('privateService'));
    }

}
