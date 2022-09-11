<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Account;
use Illuminate\Http\Request;
use Hash;
use Session;

class AccountController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function logout()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            //return view("auth.logout");

            //Redirects to logout by manual means after manual user logout.
            return view('auth.logout', ['status'=>'manual']);
        }
    }

    public function logoutAuto()
    {
        Session::pull('loginId');
        //return view("auth.logout");

        //Redirects to logout by expired session.
        return view('auth.logout', ['status'=>'auto']);
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'penname'=>'required|unique:account',
            'password'=>'required|min:8|regex:/^(?=.*\W)(?=.*[A-Z])(?=.*[0-9]).*$/'
        ]);

        $acc = new Account();
        $acc->penname = $request->penname;
        $acc->password = Hash::make($request->password);

        $result = $acc->save();

        if($result)
        {
            return back()->with('success','You have registered successfully!');
        }
        else
        {
            return back()->with('fail','An error occurred.');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'penname'=>'required',
            'password'=>'required'
            //'password'=>'required|min:8'
        ]);

        $acc = Account::where('penname','=',$request->penname)->first();

        if($acc)
        {
            if(Hash::check($request->password,$acc->password))
            {
                $request->session()->put('loginId',$acc->id);
                //return redirect('home/account');
                return redirect('home/user');
            }
            else
            {
                return back()->with('fail','Password is invalid with username.');
            }
        }
        else
        {
            return back()->with('fail','This penname is not registered or invalid.');
        }
    }

    public function account()
    {
        $data2 = array();
        if(Session::has('loginId'))
        {
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        return view('account', compact('data2'));
    }

    public function accountPosts()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = Post::where('id','=',Session::get('loginId'))->exists();
        }
        
        return view('account', compact('data'));
    }

    public function blogs()
    {
        $data2 = array();
        if(Session::has('loginId'))
        {
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //return view('account', compact('data2'));
        return view('blogs', compact('data2'));
    }

    public function about()
    {
        $data2 = array();
        if(Session::has('loginId'))
        {
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //return view('account', compact('data2'));
        return view('about', compact('data2'));
    }

    public function home()
    {
        $data2 = array();
        if(Session::has('loginId'))
        {
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //return view('account', compact('data2'));
        return view('homepage', compact('data2'));
    }
}
