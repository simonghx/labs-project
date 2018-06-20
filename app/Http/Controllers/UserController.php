<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsersRequest;
// use App\Http\Requests\UpdateUsersRequest;
use App\Services\ImageResize;

class UserController extends Controller
{
    public function __construct(ImageResize  $imageResize){
        $this->imageResize = $imageResize;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get()->filter(function($user){
            return $user->role->slug != "admin";
        });
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->poste = $request->poste;
        $user->role_id = $request->role_id;
        $user->password = bcrypt('secret');
        
        if ($request->image != null) {    
            $argImg = [
                'request' => $request->image,
                'disk1' => 'editeurs',
                'disk2' => 'editeursThumbs',
                'x' => 360,
                'y' => 488,
            ];

            $user->image = $this->imageResize->imageStore($argImg);

        }

        if($user->save()){
            return redirect()->route('users.index')->with(['message' => 'Votre éditeur a bien été ajouté.', 'status' => 'success']);
        } else {
            return redirect()->route('users.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email, '. $user->id .',id',
            'password' => 'confirmed',
            'password_confirmation' => 'required_with:password',
            'poste' => 'required',
            'role_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->poste = $request->poste;
        $user->role_id = $request->role_id;
        if($request->password != "") {
            $user->password = bcrypt($request->password);
        }

        if ($request->image != null) {   

            $argImg = [
                'request' => $request->image,
                'disk1' => 'editeurs',
                'disk2' => 'editeursThumbs',
                'x' => 360,
                'y' => 488,
            ];

            $this->imageResize->imageDelete($user->image); 
            $post->image = $this->imageResize->imageStore($argImg); 

        }

        if($user->save()){
            return redirect()->route('users.index')->with(['message' => 'Votre modification a bien été enregistrée.', 'status' => 'success']);
        } else {
            return redirect()->route('users.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect()->route('users.index')->with(['message' => 'Votre éditeur a bien été supprimé.', 'status' => 'success']);
        } else {
            return redirect()->route('users.index')->with(['message' => 'Une erreur est survenue, veuillez réessayer plus tard.', 'status' => 'danger']);
        };

    }
}
