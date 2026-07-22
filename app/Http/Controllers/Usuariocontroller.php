<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class Usuariocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        $usuarios = User::with('role')->get();

        return view('admin.usuarios.listausuarios', compact('roles', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.formusuarios');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $usuario = new User();

        $usuario->role_id = $request->post('role_id');
        $usuario->name = $request->post('name');
        $usuario->email = $request->post('email');
        $usuario->password = Hash::make($request->post('password'));
        $usuario->telefono = $request->post('telefono');
        $usuario->direccion = $request->post('direccion');
        $usuario->estado = 'activo';

        // Si el administrador autenticado es quien crea el usuario
        $usuario->created_by = auth()->id();

        $usuario->save();

        return redirect()
            ->route('usuarios.create')
            ->with('success', '¡Registro exitoso!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->role_id = $request->input('role');
        $usuario->estado = $request->input('estado');
        $usuario->save();

        return back()->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return back()->with('success', 'Usuario eliminado exitosamente');
    }
}
