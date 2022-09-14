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
        //Views the login page.
        return view("auth.login");
    }

    public function registration()
    {
        //Views the registration page.
        return view("auth.registration");
    }

    public function logout()
    {
        //If session is active
        if(Session::has('loginId'))
        {
            //This method retrieves and deletes loginId data.
            Session::pull('loginId');

            //Redirects to logout by manual means after manual user logout.
            return view('auth.logout', ['status'=>'manual']);
        }
    }

    public function logoutAuto()
    {
        //This method retrieves and deletes loginId data.
        Session::pull('loginId');

        //Redirects to logout by expired session.
        return view('auth.logout', ['status'=>'auto']);
    }

    public function registerUser(Request $request)
    {
        //Validates the request data from registration form.
        /* 
            Password requires at least 8 characters 
            containing 1 capital letter, 1 number, and 1 symbol.
        */
        $request->validate([
            'penname'=>'required|unique:account',
            'password'=>'required|min:8|regex:/^(?=.*\W)(?=.*[A-Z])(?=.*[0-9]).*$/'
        ]);

        //Creates new model for penname and hashed password.
        $acc = new Account();
        $acc->penname = $request->penname;
        $acc->password = Hash::make($request->password);

        //Saves the data.
        $result = $acc->save();

        //If result variable is true,
        if($result)
        {
            //Returns a success status.
            return back()->with('success','You have registered successfully!');
        }
        else
        {
            //Returns a fail status.
            return back()->with('fail','An error occurred.');
        }
    }

    public function loginUser(Request $request)
    {
        //Validates the request data from login form.
        $request->validate([
            'penname'=>'required',
            'password'=>'required'
        ]);
        
        //Retrieves the data where penname is equal to requested penname.
        $acc = Account::where('penname','=',$request->penname)->first();

        //If acc variable is true,
        if($acc)
        {
            //If requested password matches,
            if(Hash::check($request->password,$acc->password))
            {
                //Puts ID in session.
                $request->session()->put('loginId',$acc->id);
                //Redirects to home/user url afterwards.
                return redirect('home/user');
            }
            else
            {
                //Returns a fail status.
                return back()->with('fail','Password is invalid with username.');
            }
        }
        else
        {
            //Returns a fail status.
            return back()->with('fail','This penname is not registered or invalid.');
        }
    }

    public function account()
    {
        //Creates an array.
        $data2 = array();

        //If session has ID,
        if(Session::has('loginId'))
        {
            //Retrieves account data where the ID is equal to session ID.
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //Views the account page with passed data.
        return view('account', compact('data2'));
    }

    public function accountPosts()
    {
        //Creates an array.
        $data = array();

        //If session has ID,
        if(Session::has('loginId'))
        {
            //Retrieves account data where the ID is equal to session ID.
            $data = Post::where('id','=',Session::get('loginId'))->exists();
        }
        
        //Views the account page with passed data.
        return view('account', compact('data'));
    }

    public function blogs()
    {
        //Creates an array.
        $data2 = array();
        //If session has ID,
        if(Session::has('loginId'))
        {
            //Retrieves account data where the ID is equal to session ID.
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //Views the blogs page with passed data.
        return view('blogs', compact('data2'));
    }

    public function about()
    {
        //Creates an array.
        $data2 = array();
        //If session has ID,
        if(Session::has('loginId'))
        {
            //Retrieves account data where the ID is equal to session ID.
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //Views the about page with passed data.
        return view('about', compact('data2'));
    }

    public function home()
    {
        //Creates an array.
        $data2 = array();
        //If session has ID,
        if(Session::has('loginId'))
        {
            //Retrieves account data where the ID is equal to session ID.
            $data2 = Account::where('id','=',Session::get('loginId'))->first();
        }
        
        //Views the about page with passed data.
        return view('homepage', compact('data2'));
    }
}