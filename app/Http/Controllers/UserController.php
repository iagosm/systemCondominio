<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::with('roles')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Users/Create',[
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "password" => "required",
            "roles" => "required",
        ]);
        $user = User::create(
            $request->only(['name', 'email', 'phone' ]) + ['password' => Hash::make($request->password)]
        );
        $user->syncRoles($request->roles);
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return Inertia::render('Users/Show', [
            "user" => User::find($id)
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return Inertia::render("Users/Edit", [
            "user" => $user,
            "userRoles"=> $user->roles()->pluck('name')->all(),
            "roles" => Role::pluck('name')->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "roles" => "required"
        ]);
        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        if($request->password) {
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        $user->syncRoles($request->roles);
        return to_route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return to_route('users.index');
    }
}
