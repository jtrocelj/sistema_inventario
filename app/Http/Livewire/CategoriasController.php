<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
class CategoriasController extends Component
{
    
    use WithFileUploads;
    

    public $nombre, $search = '', $image, $selected_id, $pageTitle, $componentName;
    private $pagination =3;

    public function mount(){
        $this->pageTitle = 'Contenido';
        $this->componentName= 'Categorias';

    }
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    
    
    
    public function render(Request $request)
    
    {

        /*if(strlen($this->search) > 0)
        $data = Categoria::where('nombre', 'like', '%' . $this->search . '%');
        else
        $data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);*/
       
        if ($request){
            $query = trim($request->get('search'));
            /*$data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);*/
            $data = Categoria::where('nombre', 'LIKE', '%' . $query . '%')
            ->orderBY('id','asc')->paginate($this->pagination)
            ;

            return view('livewire.categoria.categorias',['categorias' => $data, 'search' => $query])
            ->extends('layouts.main')
            ->section('content');
        }
        
        
    }
            

}
