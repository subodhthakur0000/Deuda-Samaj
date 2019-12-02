<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Traits\Imagetrait;
use Illuminate\Http\UploadedFile;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void

     */
    use Imagetrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->back();
    }

    public function viewadmin(){
        $data = DB::table('users')->get();
        return view('cd-admin.admin.viewadmin',compact('data'));
    }

    public function addadmin(){
        return view('cd-admin.admin.addadmin');
    }

    public function storeadmin(){
        $test = Request()->all();
        $a=[];
        $data = Request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required','image','mimes:jpg,JPG,JPEG,jpeg,png,GIF'],
            'imagedescription' => ['required', 'max:200'],

            'role'      => ['required'],
        ]);
        $data['password'] = bcrypt($data['password']);
        $a['image'] = $this->imageupload($test['image']);
        $merge = array_merge($data,$a);
        DB::table('users')->insert($merge);
        return redirect('/viewadmin')->with('success','User Added Successfully');
    }

    public function deleteadmin($id){
         $test = DB::table('users')->where('id',$id)->get()->first();
         DB::table('users')->where('id',$id)->delete();
         return redirect('/viewadmin')->with('error','User Deleted Successfully');
    }
}
