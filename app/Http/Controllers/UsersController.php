<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();
        //you can also you use compact('users');
        return view('users', ['users' => $users]);
    }

    public function create()
    {
        return view('create');
    }

    public function show(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return view('show', compact('user'));
    }

    public function store(Request $request)
    {
        //Add validation here with rules!
        $newUser = new User();
        $newUser->naam = $request->naam;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->save();

        return redirect('users');
    }

    public function delete($id)
    {
        if (Auth::user()->id == $id) {
            session()->flash('danger', 'Je kunt jezelf niet wissen');
        } else {
            User::destroy($id);
            session()->flash('succes', 'User is gewist');
        }
        return redirect('/users');
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $rules = [
            'name' => 'required | min:4 | max:255',
            'email' => 'required | email | max:250 | unique:users,email,' . $user->id,
           // 'passwaord' => 'required | same:password-confirm'
        ];

        if (!empty($request->password))
            $rules['password'] = 'min:6';

        $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password))
            $user->password = bcrypt($request->password);

        $user->save();
        $request->session()->flash('success', 'User is geupdate');
        return redirect('/users');
    }
}
