<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use DB;


class AsignarController extends Controller
{
    use WithPagination;
    public $role,$permisosSelected = [],$old_permissions = [];
    private $pagination = 10;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }

    public function index(Request $request)
    {
           
            $permisos = Permission::select('name','id', DB::raw("0 as checked"))
            ->orderBy('id', 'asc')->paginate($this->pagination);

            if($this->role != 'Elegir'){
                $list = Permission::join('role_has_permissions as rp', 'rp.permission_id', 'permissions.id')
                ->where('role_id', $this->role)->pluck('permissions.id')->toArray();

                $this->old_permissions = $list;
            }
 
           
            return view('asignar.index', ['roles' => Role::orderBy('id', 'asc')->get(),
                'permisos' => $permisos
            ])
            ->extends('layouts.main')
            ->section('content');
    
      
    }

    public function SyncAll(){
        if($this->role == 'Elegir'){
            return redirect()->route("asignar.index")
                ->with([
                    "danger" => "Seleccione un rol válido",
                ]);
        }

        $role = Role::find($this->role);
        $permisos = Permission::pluck('id')->toArray();
        $role->syncPermissions($permisos);
        return redirect()->route("asignar.index")
                ->with([
                    "info" => "Se sincronizaron todos los permisos al role $role->name",
                ]);
    }

    public function syncPermiso($state, $permisoName){
        if($this->role != 'Elegir'){
            $name = Role::find($this->role);
        }
    }
}
