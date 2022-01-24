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

    public function __construct(){
        $this->middleware('auth.admin');
    }

        
    use WithPagination;
    public $name, $search, $selected_id, $permissions;
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
                $permissions = Permission::all()->pluck('name', 'id');
            return view('roles.index', ['roles' => $roles, 'permissions' => $permissions])
            ->extends('layouts.main')
            ->section('content');
    
      
    }
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        return view('roles.create', compact('permissions'));
    }
    public function store(Request $request){
       


        $role = new Role();
        $role->name = $request->name;
        // $role->permissions()->sync($request->input('permissions', []));
        $role->syncPermissions($request->input('permissions', []));
        
        $role->save();
        return redirect()->route('roles.index')
            ->with('success', 'Rol creado exitosamente.');
    }

    public function edit($id){
        
        $role = Role::find($id);
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        // dd($role);
        return view('roles.edit', compact('role', 'permissions'));
      
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->name= $request->name;
          // $role->permissions()->sync($request->input('permissions', []));
          $role->syncPermissions($request->input('permissions', []));

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

    
}
