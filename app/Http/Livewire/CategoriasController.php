<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoriasController extends Component
{
    
    use WithFileUploads;
    

    public $nombre, $search = '', $image, $selected_id, $pageTitle, $componentName;
    private $pagination =2;

    public function mount(){
        $this->pageTitle = 'Contenido';
        $this->componentName= 'Categorias';

    }
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    
    
    
    public function render()
    
    {

        if(strlen($this->search) > 0)
        $data = Categoria::where('nombre', 'like', '%' . $this->search . '%');
        else
        $data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);

        
        

        return view('livewire.categoria.categorias',['categorias' => $data])
        ->extends('layouts.main')
        ->section('content');
    }
}
