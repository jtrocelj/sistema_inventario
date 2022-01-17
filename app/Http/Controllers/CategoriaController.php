<?php


namespace App\Http\Livewire;
namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Component
{
    use WithFileUploads;
    

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
        
            $data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);
         

            return view('categoria.index',['categorias' => $data])
            ->extends('layouts.main')
            ->section('content');
    
      
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
        $rules = [
            'nombre' => 'required|unique:categorias|min:3'
        ];
        $messages = [
            'nombre.required' => 'Nombre de la categoria es requerido',
            'nombre.unique' => 'La categoria ya existe',
            'nombre.min' => 'El nombre de la categoria debe tener al menos 3 caracteres',
        ];

       
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/categoria/', $filename);
            $categoria->image =  $filename;
        }
        $categoria->save();
    
        return redirect()->route('categoria.index')
            ->with('success', 'Categoria creado exitosamente.');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria.edit', compact('categoria'));
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
        
        $categoria = Categoria::find($id);
        
        $categoria->nombre = $request->nombre;
        
        
        if($request->hasfile('image')){
            $destination = 'storage/categoria/'.$categoria->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('storage/categoria/', $filename);
            $categoria->image =  $filename;
        }
        $categoria->update();
       
        return redirect()->route('categoria.index')
            ->with('success', 'Categoria actualizado exitosamente.');
            
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $imageName = $categoria->image;
        $categoria->delete();
        if($imageName !=null){
            unlink('storage/categoria/' . $imageName);
        }
        return redirect()->route('categoria.index')
            ->with('success', 'Categoria eliminado exitosamente.');
    }
   
}
