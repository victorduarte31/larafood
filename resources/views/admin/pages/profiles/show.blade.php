@extends('adminlte::page')

@section('title', "Detalhes do Perfil {$profile->name}")

@section('content_header')
    <h1>Detalhes do plano <b>{{$profile->name}}</b></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('profiles.destroy', $profile->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger"> <i class="fas fa-trash"></i>Deletar perfil</button>
            </form>
        </div>
    </div>

@endsection
