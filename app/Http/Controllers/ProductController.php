<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_arr = product::all();
        return view('admin.manage_product', ['product_arr' => $product_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        return view('admin.add_product');
    }

    public function create()
    {
        return view('website.product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        // Ensure you're using the correct model
        $data = new product(); // Assuming you're working with the 'blog' model

        // Assign the request data
        $data->name = $request->name;
        $data->title = $request->title;


        // Check if file is uploaded

        // Get the uploaded file
        $file = $request->file('img');

        // Generate a unique file name and get file extension
        $filename = time() . '_img.' . $file->getClientOriginalExtension(); // e.g. 656676576_img.jpg

        // Move the file to the desired location
        $file->move('admin/assets/img/products', $filename); // Corrected path to 'public' directory

        // Store the file name in the database
        $data->img = $filename;

        // Assign the other data fields
        $data->description = $request->description;

        // Save the data
        $data->save();

        // Use the alert and redirect
        Alert::success('Success Title', 'Product Add Success');
        return redirect('/add_product');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = product::find($id); // Make sure you're fetching a single model instance
    
    if ($data) {
        $img = $data->img;
        if (file_exists(public_path('admin/assets/img/products/' . $img))) {
            unlink(public_path('admin/assets/img/products/' . $img));
        }
        $data->delete();
        Alert::success('Success Delete', 'Product Deleted Successfully');
    } else {
        Alert::error('Error', 'Product Not Found');
    }

    return redirect('/manage_product');
    }
}
