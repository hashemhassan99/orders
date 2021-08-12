<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }

    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);
        return view('users.index',compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => 'required',
            'roles' => 'required|array|min:1'
        ]);

        $request_data = $request->except('email');
        $user->update($request_data);
        $user->syncRoles($request->roles);
        alert()->success('','User Updated Success');
        return redirect()->route('users.index');





    }
}
