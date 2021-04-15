@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Perfis <a class="btn btn-dark" href="{{route('profiles.create')}}"><i class="fas fa-plus"></i> Adicionar novo
            Perfil </a></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" class="form-control mr-1" name="filter" placeholder="Nome"
                       value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Pesquisar <i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="330">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{$profile->name}}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-warning">Editar Perfil</a>
                            <a href="{{route('profiles.show', $profile->id)}}" class="btn btn-info">Ver Perfil</a>
                            <a href="{{route('profiles.profiles', $profile->id)}}" class="btn btn-info"><i
                                    class="fas fa-lock"></i></a>
                            <a href="{{route('profiles.plans', $profile->id)}}" class="btn btn-info"><i
                                    class="fas fa-list-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {{$profiles->appends($filters)->links("pagination::bootstrap-4")}}
            @else
                {{$profiles->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>

@stop
