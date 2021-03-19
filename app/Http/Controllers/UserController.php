<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LynX39\LaraPdfMerger\Facades\PdfMerger;
use PDF;
use App\User;
class UserController extends Controller
{
   public function user_list()
   {
   	$user=User::where('is_admin',0)->get();
   	//dd($user);
   	return view('templates.admin.user_list',compact('user'));
   }

   public function test_page()
   {
      return view('templates.admin.testpage');
   }

   public function add_user()
   {
   	return view('templates.admin.adduser');
   }

   public function post_user(Request $request)
   {
   	//dd($request);
   	$new=new User();
   	$new->name=$request->name;
   	$new->email=$request->email;
   	$new->phone=$request->phone;
   	$new->password=bcrypt($request->phone);
   	$new->dob=$request->dob;
   	$new->save();
   	return redirect()->route('user-list');
   }

   public function user_edit(Request $request)
   {
   	$user=User::where('id',$request->id)->first();
   	return view('templates.admin.edituser',compact('user'));
   }
    
    public function post_edit(Request $request)
    {
    	$edit=User::where('id',$request->id)->first();
    	//dd($edit);
         $edit->name=$request->name;
         $edit->email=$request->email;
         $edit->phone=$request->phone;
         $edit->dob=$request->dob;
         $edit->save();
         return redirect()->route('user-list'); 
    }
     public function user_delete($id)
     {
     $user = User::where('id',$id)->delete();
      return redirect()->route('user-list');

     }


    

}
