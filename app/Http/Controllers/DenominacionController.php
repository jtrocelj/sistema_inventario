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
    public $tipo, $valor,$search = '', $image, $selected_id, $pageTitle, $componentName;
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
    public function edit($id)
    {
        $denominacion = Denominacion::find($id);

        return view('denominacion.edit', compact('denominacion'));
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
        
        $denominacion = Denominacion::find($id);
        
        $denominacion->tipo = $request->tipo;
        $denominacion->valor = $request->valor;
        
        
        if($request->hasfile('image')){
            $destination = 'storage/denominacion/'.$denominacion->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/denominacion/', $filename);
            $denominacion->image =  $filename;
        }
        $denominacion->update();
       
        return redirect()->route('denominacion.index')
            ->with('success', 'Denominacion actualizado exitosamente.');
            
    }

    public function destroy($id)
    {
        $denominacion = Denominacion::find($id);
        $imageName = $denominacion->image;
        $denominacion->delete();
        if($imageName !=null){
            unlink('storage/denominacion/' . $imageName);
        }
        return redirect()->route('denominacion.index')
            ->with('success', 'Denominación eliminado exitosamente.');
    }
    

}
