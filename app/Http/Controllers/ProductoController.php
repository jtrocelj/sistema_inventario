<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Categoria;

class ProductoController extends Controller
{
    
    use WithFileUploads;

    

    public $nombre, $search = '',$barcode,$costo,$precio,$stock,$alerts,$categoriaid,$image,$selected_id;
    private $pagination =10;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            
        ]);
    }
    public function mount(){
        $this->categoriaid = 'Elegir';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request){
            $query = trim($request->get('search'));
            /*$data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);*/
            $data = Producto::where('nombre', 'LIKE', '%' . $query . '%')
            ->orderBY('id','asc')->paginate($this->pagination)
            ;

            return view('producto.index',['productos' => $data, 'search' => $query, 'categorias' => Categoria::orderBy('nombre','asc')->get()])
            ->extends('layouts.main')
            ->section('content');
        }
      
    }
}
