<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\User;

use DB;

class RolesController extends Controller
{
    use WithPagination;
    public $name, $search, $selected_id;
    private $pagination = 5;

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }


    public function index()
    {
            if(strlen($this->search) > 0)
                $roles = Role::where('name' , 'like', '%'.$this->search . '%')->paginate($this->pagination);
            else
                $roles = Role::orderBy('id', 'asc')->paginate($this->pagination);

            return view('roles.index', ['roles' => $roles])
            ->extends('layouts.main')
            ->section('content');
    
      
    }

    public function store(Request $request){
       


        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    public function edit($id){
        $role = Role::find($id);
       

        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->name= $request->name;
        $role->update();

        return redirect()->route('roles.index')
        ->with('success', 'Rol actualizado exitosamente.');
    }


    public function destroy($id){
        $permissionsCount = Role::find($id)->permissions->count();
        if($permissionsCount > 0){
            return redirect()->route("roles.index")
                ->with([
                    "danger" => "No se puede eliminar el rol porque tiene permisos asociados",
                ]);
        }

        Role::find($id)->delete();
        return redirect()->route('roles.index')
        ->with('success', 'Rol eliminado exitosamente.');
    }

    public function AsignarRoles($rolesList){
        if($this->userSelected > 0){
            $user = User::find($this->userSelected);
            if($user){
                $user->syncRoles($rolesList);
                return ([
                    "success" => "Roles asignados correctamente",
                ]);
            }
        }
    }
}
