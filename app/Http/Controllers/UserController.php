<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $pagination =8;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate($this->pagination);;
        $roles = Role::all()->pluck('name', 'id');

        return view('user.index', compact('users','roles'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.create', compact('roles'));
    }

   
    public function store(Request $request){

        $request->validate([
            
            'name' => 'required',
            'email' => 'unique:users,email,|required|email',
            'password' => ['required','min:8'],
            'telefono' => 'required',
            'rol' => 'required',
    
            ]);
        $user = User::create($request->only('name','email','telefono','rol')
        +[
            'password'=>bcrypt($request->input('password')),
        ]);
    
        $roles = $request->input('rol', []);
        $user->syncRoles($roles);

        return redirect()->route('users.index')
        ->with('success', 'Usuario registrado exitosamente');
    }
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefono = $request->telefono;
        $user->rol = $request->rol;

        $roles = $request->input('rol', []);
        $user->syncRoles($roles);
        $user->save();

        return redirect()->route('users.index')
        ->with('success', 'Usuario actualizado exitosamente');
    }
    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')
            ->with('danger', 'No te puedes eliminar a ti mismo como usuario.');
        }
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado exitosamente');
           
    }
}
