<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\User;

use DB;

class PermisosController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    use WithPagination;
    public $name, $search, $selected_id;
    private $pagination = 10;

    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }


    public function index()
    {
            if(strlen($this->search) > 0)
               $permisos = Permission::where('name' , 'like', '%'.$this->search . '%')->paginate($this->pagination);
            else
               $permisos = Permission::orderBy('id', 'asc')->paginate($this->pagination);

            return view('permisos.index', ['permisos' =>$permisos])
            ->extends('layouts.main')
            ->section('content');
    
      
    }

    public function store(Request $request){
       


        $permisos = new Permission();
        $permisos->name = $request->name;
        $permisos->save();
        return redirect()->route('permisos.index')
            ->with('success', 'Permiso creado exitosamente.');
    }

    public function edit($id){
        $permisos = Permission::find($id);
       

        return view('permisos.edit', compact('permisos'));
    }

    public function update(Request $request, $id){
        $permisos = Permission::find($id);
        $permisos->name= $request->name;
        $permisos->update();

        return redirect()->route('permisos.index')
        ->with('success', 'Permiso actualizado exitosamente.');
    }


    public function destroy($id){
        $rolesCount = Permission::find($id)->getRoleNames()->count();
        if($rolesCount > 0){
            return redirect()->route("permisos.index")
                ->with([
                    "danger" => "No se puede eliminar el permiso porque tiene roles asociados",
                ]);
        }

        Permission::find($id)->delete();
        return redirect()->route('permisos.index')
        ->with('success', 'Permiso eliminado exitosamente.');
    }

}
