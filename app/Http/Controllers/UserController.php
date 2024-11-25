<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('id','DESC')->get();
        return view('user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::orderBy('id','DESC')->get();
        return view('usertable', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    //     //VALIDAMOS LA EXISTENCIA DEL USUARIO
        $usuario = User::where("email","=",$request->email)->count();
    if ($usuario==1) {
        return;

    }
    elseif ($usuario==0){
        $user = New User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->save();
        
       
    }
      
    return $this->create();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user= User::find($request->id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user= User::find($request->id);
        $user->name= $request->name;
        $user->email= $request->email;
       // $user->password= Hash::make($request->password);
        $user->save();
        
        return $this->create();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user= User::find($request->id);
        $user->delete();
        return $this->create();
    }
}
