<?php

namespace App\Livewire\Admin\Cliente;

use App\Models\User;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use App\Models\Persona;
use App\Models\Sexo;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;
use Storage;

class CrearCliente extends Component
{
    use WithFileUploads;
    protected $listeners = ["cambiarSexo" => "cambiarSexo"];
    public $nombre;
    public $apellido;
    public $dni;
    public $fecha_nacimiento;
    public $foto;
    public $sexo;
    public $sexos;
    public $email;
    public $validations = [
        'nombre' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
        'apellido' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
        'dni' => 'required|string|max:255|unique:personas,dni|regex:/^[0-9]+$/',
        'fecha_nacimiento' => 'nullable|date|before:today|after:1900-01-01',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'sexo' => 'nullable|string|in:Femenino,Masculino',
        'email' => 'required|email|max:255|unique:users,email',
    ];
    public function mount()
    {
        $this->sexos = Sexo::query()->orderBy('nombre', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.admin.cliente.crear-cliente');
    }
    public function rendered()
    {
        $this->dispatch('initComponents');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validations);
    }
    public function cambiarSexo($value)
    {
        $this->sexo = $value;
        $this->validateOnly('sexo', $this->validations);
    }

    public function store()
    {
        // Validamos todo el formulario usando las reglas definidas
        $validated = $this->validate($this->validations);

        DB::beginTransaction();
        try {
            // Si hay foto, la almacenamos en storage/app/public/clientes
            if ($this->foto) {
                $validated['foto'] = $this->foto->store('clientes', 'public');
            }

            $user = User::create([
                'email' => $this->email,
                'password' => bcrypt($this->dni), // Cambiar a una contraseña segura o generar
            ]);
            $rol = Role::where('name', 'cliente')->first();
            $user->assignRole($rol);
            // Crear persona (cliente) en la BD
            $persona = new Persona();
            $persona->nombre = $this->nombre;
            $persona->apellido = $this->apellido;
            $persona->dni = $this->dni;
            $persona->fecha_nacimiento = Carbon::parse($this->fecha_nacimiento)->format('d-m-Y');
            $persona->foto = $validated['foto'] ?? null;
            $persona->sexo = Sexo::where('nombre', $this->sexo)->first()->id;
            $persona->user = $user->id;
            $persona->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Eliminar foto
            Storage::disk('public')->delete($validated['foto'] ?? null);
            //dd($e->getMessage());
            // Manejar el error, por ejemplo, mostrar un mensaje de error
            $this->dispatch('errorAlert', message: 'Error al crear el cliente: ' . $e->getMessage());
            return;
        }


        // Podés despachar un evento de éxito (para alertas con SweetAlert o similar)
        $this->dispatch('successAlert', message: 'Cliente creado exitosamente.');

        // Limpiar el formulario después de guardar
        $this->reset(['nombre', 'apellido', 'dni', 'fecha_nacimiento', 'sexo', 'foto', 'email']);

        $this->dispatch('loadComponent', 'admin.cliente.cliente-table');
        // Opcional: redirigir a otra ruta Livewire
        // return redirect()->route('admin.cliente.cliente-table');
    }

}
