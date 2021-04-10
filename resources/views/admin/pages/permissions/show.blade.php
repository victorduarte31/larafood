@extends('adminlte::page')

@section('title', "Detalhes da Permissão $permission->name")

@section('content_header')
    <h1>Detalhes do plano <b>{{$permission->name}}</b></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('permissions.destroy', $permission->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger"> <i class="fas fa-trash"></i>Deletar Permissão</button>
            </form>
        </div>
    </div>

@endsection
