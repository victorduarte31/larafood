@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>
    </ol>

    <h1>Permissões <a class="btn btn-dark" href="{{route('permissions.create')}}"><i class="fas fa-plus"></i> Adicionar nova Permissão </a></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" method="post" class="form form-inline">
                @csrf
                <input type="text" class="form-control mr-1" name="filter" placeholder="Nome" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark">Pesquisar <i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="380">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>
                            {{$permission->name}}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('profiles.edit', $permission->id)}}" class="btn btn-warning">Editar Permissão</a>
                            <a href="{{route('profiles.show', $permission->id)}}" class="btn btn-info">Ver Permissão</a>
                            <a href="{{route('profiles.profiles', $permission->id)}}" class="btn btn-info"><i class="fas fa-address-book"></i></a>
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
