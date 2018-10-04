@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class='topico'>        
                    <div class="jumbotron">
                        <h4 class="font-weight-bold">{{$topico->titulo}}</h4>
                        <div class="text-justify">
                            <p>{{$topico->descricao}}</p>
                        </div>

                        <hr>

                        <div class="text-right">

                            <p class="font-italic"> <span class='font-weight-bold'>Autor: </span> {{$topico->user->name}} <span class='font-weight-bold'>Data: </span> {{$topico->data_topico}}   </p>

                        </div>

                        @auth
                            @if(Auth::id() == $topico->user_id)
                                <div class="text-right">
                                    <a name="" id="topico_{{$topico->id}}" onClick="excluirTopico(this)" class="btn btn-danger" href="#" role="button">Excluir</a>
                                </div>
                            @endif
                        @endauth
                        
                    </div>
                </div>

                <div class='comentar'>
                
                    <form action="/comentarios" method="post">

                        @csrf
                        <input type="hidden" name="topico" value="{{$topico->id}}">
                        <div class="form-group">
                          <label for="">Comentario</label>
                          <textarea class="form-control" name="comentario" id="" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Comentar</button>
                            </div>
                        </div>
                    </form>
                </div>


                @foreach($comentarios as $comentario)
                <div class="alert alert-dark" role="alert">
                    <p>{{$comentario->comentario}}</p>
                    <hr>
                    <div class="text-right">
                        <p class="font-italic"> <span class='font-weight-bold'>Autor: </span> {{$comentario->user->name}} <span class='font-weight-bold'>Data: </span> {{$comentario->data_comentario}}   </p>
                        @if(Auth::id() == $comentario->user_id)

                            <div class="text-right">
                                <a name="" id="{{$comentario->id}}" onClick="excluirComentario(this)" class="btn btn-danger" href="#" role="button">Excluir</a>
                            </div>

                        @endif
                    </div>
                </div>
                @endforeach

                <div class="text-right">
                    {{$comentarios->links()}}
                </div>


            </div>
        </div>
    
    </div>


    <script>
    

    function excluirComentario (e) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/comentarios/"+e.id,
            type: 'delete',                                         
            success: function (response)
            {
                window.location.reload()
            }            
        });      
    }


    function excluirTopico (e) {
        


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/topicos/"+(e.id).replace("topico_", ""),
            type: 'delete',                                         
            success: function (response)
            {
                window.location.href = '/home'
            }            
        });      
    }
    
    
    </script>

@endsection()