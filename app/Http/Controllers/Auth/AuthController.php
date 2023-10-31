<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Monolog\Handler\NewRelicHandler;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //form login
        $title = 'Auth-login';
        return view('form.login.form_login',['title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create acc auth
        $title = 'create-Auth';
        return view('form.admin.form_auth',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store acc auth

        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'lever'     => 'required|integer',
            'password'  => 'required|min:5|max:12',
        ]);

        $auth = New User;

        $auth->name     = $request->name;
        $auth->email    = $request->email;
        $auth->lever    = $request->lever;
        $auth->password = Hash::make($request->password);

        $auth->save();
        return back()->with('good','tai khoan moi da duoc tao!');
    }

    //auth login
    public function authLogin(Request $request){
        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required|min:5|max:12',
        ]);

        $credentials = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            //dd(auth()->user()->lever);
            if (auth()->user()->lever == 0) {
                return redirect()->intended('admin/');
            }
            if (auth()->user()->lever == 1){
                return redirect()->intended('client/');
            }
        }
        return back()->withErrors([
            'msg'       => 'password or email fales'
        ])->onlyInput('email');
    }

    public function authLogOut(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function chargePassword(){
        $title = 'Charge Password';
        return view('form.login.charge_password',['title'=>$title]);
    }

    public function updatePassword(Request $request){
        
        $request->validate([
            'old_password'      => 'required|min:6|max:12',
            'new_password'      => 'required|min:6|max:12',
            "confirm_password"  => 'required|min:6|max:12|',
        ]);
        if ($request->new_password == $request->confirm_password) {
            $user = auth()->user();
            if(!hash::check($request->old_password, $user->password)){
    
                return back()->withErrors(['msg'=>'xem kiem tra lai mat khau']);
            }else{
    
                User::whereId($user->id)->update([
                    'password'=> Hash::make($request->new_password)
                ]);
    
                return back()->withErrors(['good'=>'password da duoc doi!']);
            }
            
        }else{
            return back()->withErrors(['msg'=>'xem kiem tra lai confirm password!']);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show user auth 
        $title = auth()->user()->name;
        //$id = auth()->user()->id;

        $dataUser = User::find($id);
        return view('client.information_auth',['title'=>$title,'dataUser'=>$dataUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
