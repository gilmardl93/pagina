<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use App\User;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) 
        {
            echo 1;
        }else 
        {
            echo 0;
        }
    }

    public function admin()
    {
        return view('auth.admin');
    }

    public function lists()
    {
        $users = User::Activo()->get();
        return view('user.lists', compact('users'));
    }

    public function new()
    {
        return view('user.new');
    }

    public function save(RegisterRequest $request)
    {
        $data = new User();
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->nombres  = strtoupper($request->nombres);
        $data->paterno  = strtoupper($request->paterno);
        $data->materno  = strtoupper($request->materno);
        $data->email    = $request->email;
        $data->save();  
        return redirect('usuarios')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Se registro un nuevo usuario.</div>');
    }

    public function delete(Request $request)
    {
        User::destroy($request->id);
        return redirect('usuarios')->with('message','<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>El usuario fue eliminado.</div>');
    }

    public function edit(Request $request)
    {
        $users = User::where('id',$request->id)->get();
        return view('user.edit',compact('users'));
    }

    public function update(UserRequest $request)
    {
        $users = User::where('id',$request->id)->update([
            'nombres' => strtoupper($request->nombres),
            'paterno' => strtoupper($request->paterno),
            'materno' => strtoupper($request->materno),
            'email'   => $request->email
        ]);

        return redirect('usuarios')->with('message','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>El usuario fue actualizado.</div>');
    }

}
