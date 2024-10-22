<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');    }

    public function adminlogin_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = admin::where("email", $request->email)->first(); // single data first()     // ->get(); // arr
        if ($data) {
            if (Hash::check($request->password, $data->password)) {

                session()->put('ses_adminname', $data->name);
                session()->put('ses_adminid', $data->id);
                Alert::success('Success', 'Login Success');
                return redirect('/dashboard');
            } else {
                Alert::error('Failed', 'Login Failed due wrong Password');
                return redirect('/admin_login');
            }
        } else {
            Alert::error('Failed', 'Login Failed due wrong Email');
            return redirect('/admin_login');
        }
    }

    function admin_logout()
    {

        session()->pull('ses_adminid');
        session()->pull('ses_adminname');
        Alert::success('Congrats', 'You\'ve Successfully Logout');
        return redirect('/admin_login');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
