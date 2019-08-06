<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('login.index');
    }

      public function login(Request $request){

        $request->validate([
            'matricula' => 'required',
            'password' => 'required'
        ]);
        $credentials = ['matricula'=>$request->matricula,'password'=>$request->password];
        if(Auth::attempt($credentials)){
            $user = DB::table('users')->where('matricula', $request->matricula)->first();
            return redirect()->intended('inicio');
        }else{
            return redirect()->back()->with('msg',"Acesso negado com estas credenciais");
        }

   }

}
