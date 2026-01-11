<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChurchSector;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $churchSections = ChurchSector::all();
        $roles = Role::all();
        return view('users.create', compact('churchSections', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'church_section_id' => 'nullable|exists:church_sectors,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $email = "teste@teste.com";
        $password = "teste@teste.com";

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->church_section_id = $request->input('church_section_id');
        $user->save();

        // Associar papéis ao usuário
        $user->roles()->attach($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user = User::findOrFail($id);
        $churchSections = ChurchSector::all();
        $roles = Role::all();
        $userRoleIds = $user->roles->pluck('id');
        return view('users.edit', compact('user', 'churchSections', 'roles', 'userRoleIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'church_section_id' => 'nullable|exists:church_sectors,id',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->church_section_id = $request->input('church_section_id');
        $user->save();

        // Atualizar papéis do usuário
        $user->roles()->sync($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach(); // Remover associações de papéis
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
