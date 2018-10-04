<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Topico;
use App\Comentario;

class TopicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
        $this->middleware('auth');
     }


    public function index()
    {
        //Utilizar como meus topicos


        $user = Auth::user();

        $topicos = Topico::where('user_id', $user->id)->orderBy('data_topico', 'desc')->paginate(5);

        return view('topicos.meus_topicos', compact("topicos"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topicos.novo_topico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $topico = new Topico();
        $topico->titulo = $request->input('titulo');
        $topico->descricao = $request->input('descricao');
        $topico->data_topico = Date('Y-m-d h:i:s');
        $topico->user_id = $user->id;
        
        $topico->save();

        $statusSalvo = true;

        return view('topicos.novo_topico', compact('statusSalvo'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $topico = Topico::with('user')->get()->where('id', $id)->first();

        $comentarios = Comentario::with('user')->where('topico_id', $id)->paginate(2);

        

        return view('topicos.exibir_topico', compact('topico', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topico = Topico::find($id);

        if(!empty($topico));
            $topico->delete();

        return response([],200);


    }
}
