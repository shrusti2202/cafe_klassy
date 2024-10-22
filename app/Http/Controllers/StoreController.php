<?php

namespace App\Http\Controllers;

use App\Models\store;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store_arr = store::all();
        return view('admin.manage_store', ['store_arr' => $store_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        return view('admin.add_store');
    }  
   
    public function create()
    {
        return view('website.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validate the incoming request data
       $validated = $request->validate([
        'name' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'required',
        'price' => 'required|numeric|min:0'
    ]);

    // Create a new store instance
    $data = new Store();

    // Assign the validated data to the store
    $data->name = $request->name;

    // Handle file upload for store image
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '_img.' . $file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/img/stores'), $filename);
        $data->img = $filename;
    }

    // Assign the remaining validated data
    $data->description = $request->description;
    $data->price = $request->price;

    // Save the new store record
    $data->save();

    // Display a success alert and redirect back to the add store page
    Alert::success('Success Title', 'Store Add Success');
    return redirect('/add_store');
    }

    /**
     * Display the specified resource.
     */
    public function show(store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(store $store)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = store::find($id); // Make sure you're fetching a single model instance
    
        if ($data) {
            $img = $data->img;
            if (file_exists(public_path('admin/assets/img/stores/' . $img))) {
                unlink(public_path('admin/assets/img/stores/' . $img));
            }
            $data->delete();
            Alert::success('Success Delete', 'Store Deleted Successfully');
        } else {
            Alert::error('Error', 'Store Not Found');
        }
    
        return redirect('/manage_store');
    }
}
