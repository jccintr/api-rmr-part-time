<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::where('ativo',1)->orderBy('nome')->get();
        if ($categorias) {
          return response()->json($categorias,200);
        } else {
          return response()->json(['erro'=>'Categorias não encontradas.'],404);
        }
      
    }

    public function index2()
    {
        $categorias = Categoria::withCount('orcamentos')->orderBy('nome')->get();
        if ($categorias) {
          return response()->json($categorias,200);
        } else {
          return response()->json(['erro'=>'Categorias não encontradas.'],404);
        }
      
    }

    public function listAll()
    {
        $categorias = Categoria::orderBy('nome')->get();
        if ($categorias) {
          return response()->json($categorias,200);
        } else {
          return response()->json(['erro'=>'Categorias não encontradas.'],404);
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       // $request->validate([
       //     'imagem' => 'required|mimes:jpg,png|max:2048',
       // ]);


      $array = ['erro'=>''];
      $nome = $request->nome;
      $descricao = $request->descricao;
      $imagem = $request->file('imagem');

     

      if (!$imagem or !$nome or !$descricao) {
        $array['erro'] = "Campos Obrigatórios não informados.";
        return response()->json($array,400);
      }

      $imagem_url = $imagem->store('imagens/categorias','public');

      $newCategoria = new Categoria();
      
      $newCategoria->nome = $nome;
      $newCategoria->descricao = $descricao;
      $newCategoria->imagem = $imagem_url;
      $newCategoria->save();
     
      return response()->json($newCategoria,201);

      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::with('worker.user.concelho.distrito')->find($id);
        return response()->json($categoria,200);

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
        $imagem = $request->file('imagem');
        $nome = $request->nome;
        $descricao = $request->descricao;
        $ativo =  $request->ativo;
        
        
        if(!$nome or !$descricao ){
             $array['erro'] = "Campos obrigatórios não informados. ".$nome;
             return response()->json($array,400);
        }

        $categoria = Categoria::find($id);
        $categoria->nome = $nome;
        $categoria->descricao = $descricao;
        $categoria->ativo = $ativo;

        if($imagem){
            Storage::disk('public')->delete($categoria->imagem);
            $imagem_url = $imagem->store('imagens/categorias','public');
            $categoria->imagem = $imagem_url;
        }

        $categoria->save();
        return response()->json($categoria,200);

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
