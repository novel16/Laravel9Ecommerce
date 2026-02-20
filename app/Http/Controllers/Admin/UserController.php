<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=> ['required', 'string','min:8'],
            'role_as' => ['required', 'integer'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
            'role_as'=> $validated['role_as'],
        ]);

        return redirect('admin/users')->with('message', 'User added successfully');

    }
    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>['required', 'string','max:255'],
            'role_as' => ['required', 'integer'],
        ]);

        $updateUser = User::findOrFail($user);
        $updateUser->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_as' => $validated['role_as'],
        ]);

        return redirect('admin/users')->with('message', 'User updated successfully');
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return redirect('admin/users')->with('message', 'User deleted successfully');
    }
}
