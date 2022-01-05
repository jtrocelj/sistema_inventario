<?php

namespace App\Http\Controllers;

use App\Models\Denominacion;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DenominacionController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $nombre, $search = '', $image, $selected_id, $pageTitle, $componentName;
    private $pagination =4;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            
        ]);
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
            $data = Denominacion::where('tipo', 'LIKE', '%' . $query . '%')
            ->orderBY('id','asc')->paginate($this->pagination)
            ;

            return view('denominacion.index',['denominacions' => $data, 'search' => $query])
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
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       
        $denominacion = new Denominacion();
        $denominacion->tipo = $request->tipo;
        $denominacion->valor = $request->valor;
        

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/categoria/', $filename);
            $denominacion->image =  $filename;
        }
        $denominacion->save();
    
        return redirect()->route('denominacion.index')
            ->with('success', 'Denominacion creado exitosamente.');
    }


   
    

}
