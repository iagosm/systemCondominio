<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::with('user')->get()->map(function ($resident) {
            return [
                'id' => $resident->id,
                'name' => $resident->name,
                'email' => $resident->email,
                'phone' => $resident->phone,
                'type' => $resident->type,
                'roles' => $resident->user ? $resident->user->roles->pluck('name') : [],
            ];
        });

        return Inertia::render('Residents/Index', [
            'residents' => $residents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Residents/Create', [
            'roles' => Role::pluck('name')->all() 
        ]);
    }

    public function show(string $id)
    {
        $resident = Resident::with('user.roles')->findOrFail($id);
        return Inertia::render('Residents/Show', [
            'resident' => [
                'id' => $resident->id,
                'name' => $resident->user->name,
                'email' => $resident->user->email,
                'phone' => $resident->user->phone,
                'type' => ucfirst($resident->type),
                'roles' => $resident->user->roles->pluck('name')->all(),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable',
            'password' => 'required',
            'type' => 'required',
            'roles' => 'nullable',
        ]);
        // dd($request->phone);
        // Criar usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        // Atribuir role
        $user->assignRole($request->roles ?? 'Morador');

        $resident = Resident::create([
            'user_id' => $user->id,
            'type' => $request->type
        ]);

        return to_route('residents.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resident = Resident::with('user.roles')->findOrFail($id);

        return Inertia::render('Residents/Edit', [
            'resident' => [
                'id' => $resident->id,
                'name' => $resident->user->name,
                'email' => $resident->user->email,
                'phone' => $resident->user->phone,
                'type' => $resident->type,
                'roles' => $resident->user->roles->pluck('name')->all(),
            ],
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resident = Resident::with('user')->findOrFail($id);
        $user = $resident->user;

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable',
            'password' => 'nullable',
            'type' => 'required',
            'roles' => 'nullable',
        ]);

        // Atualiza usuário
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Atualiza resident
        $resident->update([
            'type' => $request->type
        ]);

        // Atualiza roles
        if ($request->roles) {
            $user->syncRoles($request->roles);
        }

        return to_route('residents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();
        $resident->user()->delete();
        return to_route('residents.index');
    }
}
