<?php

namespace App\Http\Controllers;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Cliente;


class ClienteController extends Controller
{
    use WithFileUploads;
    

    public $apellidos, $search = '', $ci;
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
    public function index(Request $request)
    {
       
            /*$data = Categoria::orderBy('id', 'asc')->paginate($this->pagination);*/
            $data = Cliente::orderBy('id','desc')->paginate($this->pagination);

            return view('clientes.index',['clientes' => $data])
            ->extends('layouts.main')
            ->section('content');
        
      
    }

    public function create()
    {
        $cliente = new Cliente();
        return view('caliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       
        $cliente = new Cliente();
        $cliente->apellidos = $request->apellidos;
        $cliente->ci = $request->ci;

       
        $cliente->save();
    
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('clientes.edit', compact('categoria'));
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
        
        $cliente = Cliente::find($id);
        $cliente->apellidos = $request->apellidos;
        $cliente->ci = $request->ci;

        $cliente->update();
       
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
            
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
       
        $cliente->delete();
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }

}
