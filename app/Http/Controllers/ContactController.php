<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact_arr = contact::all();
        return view('admin.manage_contact', ['contact_arr' => $contact_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.contact');
    }

    public function insert()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Ensure you're using the correct model
        $data = new contact; // Assuming you're working with the 'blog' model

        // Assign the request data
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;

        // Save the data
        $data->save();

        // Use the alert and redirect
        Alert::success('Success Title', ' Success Message');
        return redirect('/contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = contact::find($id);
        if ($data) {
            $data->delete();
            Alert::success('Success Delete', 'Contact Deleted Success');
        } else {
            Alert::error('Error', 'Contact Not Found');
        }
        return redirect('/manage_contact');
    }
}
