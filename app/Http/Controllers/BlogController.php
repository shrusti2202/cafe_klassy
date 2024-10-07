<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_arr=blog::all();
        return view('admin.manage_blog',['blog_arr'=>$blog_arr]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert()
    {
        return view('admin.add_blog');
    }

    public function create()
    {
        return view('website.blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required'
        ]);

        // Ensure you're using the correct model
        $data = new blog; // Assuming you're working with the 'blog' model
    
        // Assign the request data
        $data->name = $request->name;
    
    
        // Check if file is uploaded
        
            // Get the uploaded file
            $file = $request->file('img');
    
            // Generate a unique file name and get file extension
            $filename = time() . '_img.' . $file->getClientOriginalExtension(); // e.g. 656676576_img.jpg
    
            // Move the file to the desired location
            $file->move('admin/assests/img/blogs', $filename); // Corrected path to 'public' directory
    
            // Store the file name in the database
            $data->img = $filename;
    
        // Assign the other data fields
        $data->description = $request->description;
    
        // Save the data
        $data->save();
    
        // Use the alert and redirect
        Alert::success('Success Title', 'Blog Add Success');
        return redirect('/add_blog');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blog)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = blog::find($id);
        if ($data) {
            $img = $data->img;
            if (file_exists('admin/assets/img/blogs/' . $img)) {
                unlink('admin/assets/img/blogs/' . $img);
            }
            $data->delete();
            Alert::success('Success Delete', 'Blog Deleted Success');
        } else {
            Alert::error('Error', 'Blog Not Found');
        }
        return redirect('/manage_blog');
    }
    
}    
