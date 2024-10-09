<?php

namespace App\Http\Controllers;

use App\Models\feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.feature');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_feature');
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
    public function show(feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(feature $feature)
    {
        $feature_arr = feature::all();
        return view('admin.manage_feature', ['feature_arr' => $feature_arr]);
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
    public function destroy(feature $feature)
    {
        //
    }
}
