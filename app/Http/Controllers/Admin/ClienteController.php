<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.clientes', compact('clientes'));
    }

    public function create()
    {
        return view('livewire.admin.clientes-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:clientes,dni',
            'edad' => 'nullable|string|max:10',
            'sexo' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:clientes,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Asignar el user_id si está autenticado
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        Cliente::create($validated);

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente creado exitosamente');
    }

    public function show(Cliente $cliente)
    {
        return view('livewire.admin.clientes-show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('livewire.admin.clientes-edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:255|unique:clientes,dni,' . $cliente->id,
            'edad' => 'nullable|string|max:10',
            'sexo' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Asignar el user_id si está autenticado
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('foto')) {
            if ($cliente->foto) {
                Storage::disk('public')->delete($cliente->foto);
            }
            $validated['foto'] = $request->file('foto')->store('clientes', 'public');
        }

        $cliente->update($validated);

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->foto) {
            Storage::disk('public')->delete($cliente->foto);
        }

        $cliente->delete();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente eliminado exitosamente');
    }
}