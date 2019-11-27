<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Replycontact;
use DB;
use App\Traits\Validation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

class ContactController extends Controller
{
   use Validation;
    public function index()
    {
      $data = Contact::orderBy('created_at', 'desc')->paginate(10);
    	return view('cd-admin.contact.contact',compact('data'));	
    }

    public function insertform()
    {
    	return view('cd-admin.contact.add-contact');
    	
    }

    public function store()
   {
   $a=[];
   $test=$this->contactvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);
   DB::table('contacts')->insert($merge);
   return redirect('/contacts')->with('success','Inserted Successfully');
 }

  public function delete($id)
{
  DB::table('contacts')->where('id',$id)->delete();
  return redirect('/contacts')->with('error','Deleted Successfully');
}


public function replystore($id)
   {
   $a=[];
   $test=$this->replyvalidation();
   $a['created_at'] = Carbon::now('Asia/Kathmandu');
   $merge = array_merge($test,$a);

   $data = Contact::where('id',$id)->get()->first();
   $data['status']=$merge['status'];
   $data->update();

   DB::table('replycontacts')->insert($merge);
   Mail::to($merge['email'])->send(new contactMail($merge));
   return redirect('/contacts')->with('success','Replied Successfully');
 }

 public function sentmessage()
    {
      $reply = Replycontact::all();
      return view('cd-admin.contact.sent-message',compact('reply'));
      
    }

    public function deletereply($id)
{
  DB::table('replycontacts')->where('id',$id)->delete();
  return redirect('/sentmessage')->with('error','Deleted Successfully');
}

public function replyform($id){
  $data=Contact::where('id',$id)->get()->first();
  return view('cd-admin.contact.reply',compact('data'));
}
}
