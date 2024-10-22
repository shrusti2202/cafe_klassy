<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial_arr = testimonial::all();
        return view('admin.manage_testimonial', ['testimonial_arr' => $testimonial_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.testimonial');
    }

    public function insert()
    {
        return view('admin.add_testimonial');

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
    ]);

    // Create a new store instance
    $data = new testimonial();

    // Assign the validated data to the store
    $data->name = $request->name;

    // Handle file upload for store image
    if ($request->hasFile('img')) {
        $file = $request->file('img');
        $filename = time() . '_img.' . $file->getClientOriginalExtension();
        $file->move(public_path('admin/assets/img/testimonials'), $filename);
        $data->img = $filename;
    }

    // Assign the remaining validated data
    $data->description = $request->description;

    // Save the new store record
    $data->save();

    // Display a success alert and redirect back to the add store page
    Alert::success('Success Title', 'Testimonial Add Success');
    return redirect('/add_testimonial');
    }

    /**
     * Display the specified resource.
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimonial $testimonial)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, testimonial $testimonial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = testimonial::find($id); // Make sure you're fetching a single model instance
    
        if ($data) {
            $img = $data->img;
            if (file_exists(public_path('admin/assets/img/testimonial/' . $img))) {
                unlink(public_path('admin/assets/img/testimonial/' . $img));
            }
            $data->delete();
            Alert::success('Success Delete', 'Testimonial Deleted Successfully');
        } else {
            Alert::error('Error', 'Testimonial Not Found');
        }
    
        return redirect('/manage_testimonial');
    }
}
