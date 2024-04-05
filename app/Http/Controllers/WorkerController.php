<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Worker;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::with('categoria')->with('user.concelho.distrito')->get();
        return response()->json($workers,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::User()->isAdmin){
            return response()->json(['erro'=>'Acesso não autorizado.'],401);
        }
        
        $nome = $request->nome;
        $telefone = $request->telefone;
        $categoria_id = $request->categoria_id;
        $concelho_id = $request->concelho_id;
        $isAdmin = $request->isAdmin;
        $avatar = $request->file('avatar');
    
        if(!$nome or !$telefone or !$concelho_id or !$categoria_id ){
            $array['erro'] = "Campos obrigatórios não informados.";
            return response()->json($array,400);
       }

       $worker = Worker::find($id);
       $worker->categoria_id = $categoria_id;
       $worker->save();
    
       $user = User::find($worker->user_id);
       $user->name = $nome;
       $user->telefone = $telefone;
       $user->concelho_id = $concelho_id;
       $user->isAdmin = $isAdmin;
       
       if($avatar){
           if($user->avatar){
              Storage::disk('public')->delete($user->avatar);
           }
          
           $avatar_url = $avatar->store('imagens/avatar','public');
           $user->avatar = $avatar_url;
       }
    
       $user->save();
       return response()->json($worker,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
