<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; // use Alert;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Mail\welcomemail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_arr = user::all();
        return view('admin.manage_users', ["users" => $user_arr]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('website.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile' => 'required',
            'password' => 'required',
            'img' => 'required'
        ]);

        $data = new user;
        $name=$data->name = $request->name;
        $email=$data->email = $request->email;
        $data->mobile = $request->mobile;
        $password=$request->password;
        $data->password = Hash::make($request->password);
      

        // image upload
        $file = $request->file('img');
        $filename = time() . '_img.' . $file->getClientOriginalExtension(); // 656676576_img.jpg
        $file->move('website/images/users/', $filename);  // use move for move image in public/images

        $data->img = $filename; // name store in db

        $mail_data=array("name"=>$name,"email"=>$email,"password"=>$password);
        Mail::to($email)->send(new welcomemail($mail_data));


        $data->save();
        Alert::success('Success Title', 'Signup Success');
        return redirect('/signup');
    }

    public function login(Request $request)
    {
        return view('website.login');
    }


    public function login_auth(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = user::where("email", $request->email)->first(); // single data first()     // ->get(); // arr
        if ($data) {
            if (Hash::check($request->password, $data->password)) {
                if ($data->status == "Unblock") {
                    
                    // create session
                    session()->put('ses_username',$data->name); 
                    session()->put('ses_userid',$data->id); 


                    Alert::success('Success', 'Login Success');
                    return redirect('/');
                }else {
                    Alert::error('Failed', 'Login Failed due Blocked Account');
                    return redirect('/login');
                }
            } else {
                Alert::error('Failed', 'Login Failed due wrong Password');
                return redirect('/login');
            }
        } else {
            Alert::error('Failed', 'Login Failed due wrong Email');
            return redirect('/login');
        }
    }


    function user_logout(){

        session()->pull('ses_userid');
		session()->pull('ses_username');
		Alert::success('Congrats', 'You\'ve Successfully Logout');
		return redirect('/');
    }
    
 
    public function forgotpass(Request $request)
    {
        return view('website.forgotpass');
    }

    /**
     * Display the specified resource.
     */

     public function userprofile()
    {
        //$data=user::all(); // all data in array
        $data=user::where("id",session()->get('ses_userid'))->first(); // single data 
        //$data=user::where("id",session()->get('ses_userid'))->get(); // get by con data arr 
        return view('website.userprofile',['data'=>$data]);
    }

    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $data=user::find($id);
        return view('website.editprofile', ["data"=>$data]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'name' => 'required|alpha:ascii',
        ]);

        $data = user::find($id); // single data
        $data->name = $request->name;
        
        // image upload
        if($request->hasfile('img'))
        {
            $old_img=$data->img;
            unlink('website/images/users/'.$old_img);

            $file = $request->file('img');
            $filename = time() . '_img.' . $file->getClientOriginalExtension(); // 656676576_img.jpg
            $file->move('website/images/users/', $filename);  // use move for move image in public/images
            $data->img = $filename; // name store in db
        }  

        $data->update();

        session()->put('ses_username',$request->name); 
        
        Alert::success('Success', 'Update Success');
        return redirect('/userprofile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = User::find($id); // Make sure you're fetching a single model instance
    
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

        
    
        return redirect('/manage_user');
    }
}
