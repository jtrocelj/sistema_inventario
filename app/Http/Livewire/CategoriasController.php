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
    use WithPagination;

    public $nombre, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount(){
        $this->pageTitle = 'Contenido';
        $this->componentName= 'Categorias';

    }

    public function render()
    {
        $data = Categoria::all();
        return view('livewire.categoria.categorias',['categorias' => $data])
        ->extends('layouts.main')
        ->section('content');
    }
}
