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
            <form action="{{route('permissions.search')}}" method="post" class="form form-inline">
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
                            {{--<a href="{{route('details.plan.index', $plan->url)}}" class="btn btn-secondary">Ver detalhes</a>--}}
                            <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-warning">Editar Permissão</a>
                            <a href="{{route('permissions.show', $permission->id)}}" class="btn btn-info">Ver Permissão</a>
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
