<?php

namespace App\Http\Controllers;

use App\Models\feature;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feature_arr = feature::all();
        return view('admin.manage_feature', ['feature_arr' => $feature_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        return view('admin.add_feature');
    }

    public function create()
    {
        return view('website.feature');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required'
        ]);

        // Ensure you're using the correct model
        $data = new feature(); // Assuming you're working with the 'blog' model

        // Assign the request data
        $data->name = $request->name;


        // Check if file is uploaded

        // Get the uploaded file
        $file = $request->file('img');

        // Generate a unique file name and get file extension
        $filename = time() . '_img.' . $file->getClientOriginalExtension(); // e.g. 656676576_img.jpg

        // Move the file to the desired location
        $file->move('admin/assets/img/features', $filename); // Corrected path to 'public' directory

        // Store the file name in the database
        $data->img = $filename;

        // Assign the other data fields
        $data->title = $request->title;

        // Save the data
        $data->save();

        // Use the alert and redirect
        Alert::success('Success Title', 'Feature Add Success');
        return redirect('/add_feature');

    }

    /**
     * Display the specified resource.
     */
    public function show(feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feature $feature)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, feature $feature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
 

public function destroy($id)
{
    $data = Feature::find($id); // Make sure you're fetching a single model instance
    
    if ($data) {
        $img = $data->img;
        if (file_exists('admin/assets/img/features/' . $img)) {
            unlink('admin/assets/img/features/' . $img);
        }
        $data->delete();
        Alert::success('Success Delete', 'Feature Deleted Successfully');
    } else {
        Alert::error('Error', 'Feature Not Found');
    }

    return redirect('/manage_feature');
}
}
