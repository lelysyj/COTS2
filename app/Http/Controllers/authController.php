<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $r)
    {
        $r->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $users = [
            'admin' => ['password'=>'admin123','role'=>'admin'],
            'user' => ['password'=>'user123','role'=>'user'],
        ];

        $u = $r->input('username');
        $p = $r->input('password');

        if(isset($users[$u]) && $users[$u]['password'] === $p){
            session(['user'=>['username'=>$u,'role'=>$users[$u]['role']]]);
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['login'=>'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}