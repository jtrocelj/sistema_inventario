<?php

namespace App\Http\Livewire;
namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class ProductoController extends Component
{
    
    use WithFileUploads;

    

    public $nombre, $search = '',$barcode,$costo,$precio,$stock,$alerts,$categoria_id,$image,$selected_id;
    private $pagination =5;

   
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
        $this->categoria_id = 'Elegir';
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

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:categorias|min:3',
            'costo' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'categoria_id' => 'required|not_in:Elegir'
        ];
        $messages = [
            'nombre.required' => 'Nombre de la categoria es requerido',
            'nombre.unique' => 'La categoria ya existe',
            'nombre.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
            'costo.required' => 'El costo es requerido',
            'precio.required' => 'El precio es requerido',
            'stock.required' => 'El stock es reckerido',
            'alerts.required' => 'Ingresa el valor minimo de inventario',
            'categoria_id.not_i' => 'Elige un nombre de categoria diferente de Elegir',

        ];
      
       $producto = new Producto();
       $producto->nombre = $request->nombre;
       $producto->costo = $request->costo;
       $producto->precio = $request->precio;
       $producto->barcode = $request->barcode;
       $producto->stock = $request->stock;
       $producto->alerts = $request->alerts;
       $producto->categoria_id = $request->categoria_id;

       
      

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/producto/', $filename);
            $producto->image =  $filename;
        }
        $producto->save();
    
        return redirect()->route('producto.index')
            ->with('success', 'Producto created successfully.');
    }


/**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Categoria $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $producto= Producto::find($id);
        
        $producto->nombre = $request->nombre;
        $producto->costo = $request->costo;
       $producto->precio = $request->precio;
       $producto->barcode = $request->barcode;
       $producto->stock = $request->stock;
       $producto->alerts = $request->alerts;
       $producto->categoria_id = $request->categoria_id;
        
        if($request->hasfile('image')){
            $destination = 'storage/producto/'.$producto->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/categoria/', $filename);
            $producto->image =  $filename;
        }
        $producto->update();
       
        return redirect()->route('producto.index')
            ->with('success', 'Producto actualizado exitosamente');
            
    }
}
