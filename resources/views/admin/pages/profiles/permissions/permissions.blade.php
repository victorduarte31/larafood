@extends('adminlte::page')

@section('title', "Permissoes do perfil $profile->name")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>

    <h1>Permissões do  {{$profile->name}} <a class="btn btn-dark"
                                                   href="{{route('profiles.permissions.available', $profile->id)}}"><i
                class="fas fa-plus"></i> ADICIONAR NOVA PERMISSÃO</a></h1>
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
                    <th width="300">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>
                            {{$permission->name}}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-warning">Editar Perfil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {{$permissions->appends($filters)->links("pagination::bootstrap-4")}}
            @else
                {{$permissions->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>

@stop
