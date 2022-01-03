<?php


namespace App\Http\Livewire;
namespace App\Http\Controllers;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;

/**
 * Class CategoriaController
 * @package App\Http\Controllers
 */
class CategoriaController extends Component
{
    use WithFileUploads;
    

    public $nombre, $search = '', $image, $selected_id, $pageTitle, $componentName;
    private $pagination =3;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
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
            $data = Categoria::where('nombre', 'LIKE', '%' . $query . '%')
            ->orderBY('id','asc')->paginate($this->pagination)
            ;

            return view('categoria.index',['categorias' => $data, 'search' => $query])
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
        request()->validate([
            'nombre' => 'required',
        ]);

        
        $categoria = Categoria::create($request->all());

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria created successfully.');
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
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate(Categoria::$rules);

        $categoria->update($request->all());

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id)->delete();

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria deleted successfully');
    }
   
}
