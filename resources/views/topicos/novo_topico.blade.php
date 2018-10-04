@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="text-center mb-5">
                    <h1>Criar Um novo Topico</h1>
                </div>

                <form action="/topicos" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="titulo">Titulo</label>
                      <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo">                      
                    </div>
                    <div class="form-group">
                      <label for="descricao">Descrição</label>
                      <textarea class="form-control" name="descricao" placeholder='Descricao' id="descricao" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="text-right">

                            <button type="submit" class="btn btn-primary">Gravar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                        
                        </div>
                    </div>


                </form>

                @isset($statusSalvo)
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    Salvo com sucesso!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif


            </div>            

        </div>

    </div>

@endsection()