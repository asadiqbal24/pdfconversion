<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use DB;

use Auth;


class LoginController extends Controller
{
  
    use AuthenticatesUsers;
  
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    public function login(Request $request)
    {   
        $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }


     public function logout(Request $request) {
      Auth::logout();
     return redirect()->route('login');
    }

    public function registration()
    {
        return view('auth.register');
    }
     public function getlogin()
    {
        return view('auth.login');
    }
    public function post_registration(Request $request)
    {
      //  dd($request);

         $this->validate($request,[
          'email' => 'required|max:255|email|unique:users,email',
          'password' => 'required|min:6',
          
           
       ]);


            $user  = User::insertGetId([
                'name'=>$request->name,
                'email'=>$request->email, 
                'password'=>bcrypt($request->password),
               
                // 'email'=>$request->email
                ]);

      // dd($user);
      $id=User::find($user);        
         $role=DB::table('roles')->where('name','User')->first();
             $id->roles()->attach($role->id);
             return redirect()->route('login');
    }
}
