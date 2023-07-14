<?php

namespace App\Http\Controllers\Admin;

use App\Enum\ContactEnum;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $create = Contact::create($data);
        if($create){
            return redirect()->back()->with('success', 'Message sent successfully');
        }
        return redirect()->back()->with('error', 'Message not sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show', compact('contact'));
    }

}
