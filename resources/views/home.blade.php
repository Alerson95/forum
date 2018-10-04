@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">

            <div class="">

                <h1>Topicos</h1>
            
            </div>

            <table class="table table-bordered table-hover">
                <thead class="thead-dark" >
                    <tr>
                        <th>Titulo</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody class="">

                @foreach($topicos as $topico)
                    <tr class="">                    
                        <td class="" > <a href="/topicos/{{$topico->id}}" class=" text-dark " > {{$topico->titulo}} </a> </td>
                        <td class="" >{{$topico->data_topico}}  </td>
                    </tr>
                @endforeach
            </table>

            <div class="paginator" >
            
                {{$topicos->links()}}
            
            </div>
        
        </div>
    </div>
</div>
@endsection
