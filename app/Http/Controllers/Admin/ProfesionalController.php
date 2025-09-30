<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesionalController extends Controller
{
    public function index()
    {
        $profesionales = Profesional::orderBy('created_at', 'desc')->get();
        return view('livewire.admin.profesionales', compact('profesionales'));
    }

    public function create()
    {
        return view('livewire.admin.profesionales-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:profesionals,email',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'activo' => 'boolean',
            'fecha_ingreso' => 'required|date'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('profesionales', 'public');
        }

        Profesional::create($validated);

        return redirect()->route('admin.profesionales.index')
            ->with('success', 'Profesional creado exitosamente');
    }

    public function show(Profesional $profesional)
    {
        return view('livewire.admin.profesionales-show', compact('profesional'));
    }

    public function edit(Profesional $profesional)
    {
        return view('livewire.admin.profesionales-edit', compact('profesional'));
    }

    public function update(Request $request, Profesional $profesional)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:profesionals,email,' . $profesional->id,
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'activo' => 'boolean',
            'fecha_ingreso' => 'required|date'
        ]);

        if ($request->hasFile('foto')) {
            if ($profesional->foto) {
                Storage::disk('public')->delete($profesional->foto);
            }
            $validated['foto'] = $request->file('foto')->store('profesionales', 'public');
        }

        $profesional->update($validated);

        return redirect()->route('admin.profesionales.index')
            ->with('success', 'Profesional actualizado exitosamente');
    }

    public function destroy(Profesional $profesional)
    {
        if ($profesional->foto) {
            Storage::disk('public')->delete($profesional->foto);
        }

        $profesional->delete();

        return redirect()->route('admin.profesionales.index')
            ->with('success', 'Profesional eliminado exitosamente');
    }
}