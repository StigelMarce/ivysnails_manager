<?php

namespace App\Livewire\Admin\Cliente;

use App\Models\Persona;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;  
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable; 
final class ClienteTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'cliente-table-yr40kn-table';

    public function setUp(): array
    {
        // $this->showCheckBox();
        PowerGrid::exportable(fileName: 'my-export-file') 
            ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV);
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {

        return Persona::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('nombre')
            ->add('apellido')
            ->add('dni')
            ->add('fecha_nacimiento', fn(Persona $model) => Carbon::parse($model->fecha_nacimiento)->format('d/m/Y'))
            ->add('created_at', fn(Persona $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Apellido', 'apellido')
                ->sortable()
                ->searchable(),

            Column::make('DNI', 'dni')
                ->sortable()
                ->searchable(),

            Column::make('Fecha de Nacimiento', 'fecha_nacimiento')
                ->sortable(),

            Column::make('Fecha de Creación', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Acciones')
                ->visibleInExport(false),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('nombre'),
            Filter::inputText('apellido'),
            Filter::inputText('dni'),
            Filter::datepicker('fecha_nacimiento')->params([
                'format' => 'd/m/Y',
                'mode' => 'single',
                'enableTime' => false,
                'maxDate' => 'today',
            ]),
            Filter::datepicker('created_at')->params([
                'format' => 'd/m/Y H:i:s',
                'mode' => 'multiple',
                'maxDate' => 'today'
            ]),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Persona $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
