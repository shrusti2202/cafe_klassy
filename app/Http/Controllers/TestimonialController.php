<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.testimonial');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_testimonial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $testimonial_arr=testimonial::all();
        return view('admin.manage_testimonial',['testimonial_arr'=>$testimonial_arr]);
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
    public function destroy(testimonial $testimonial)
    {
        //
    }
}
