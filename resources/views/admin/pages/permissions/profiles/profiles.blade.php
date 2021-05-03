@extends('adminlte::page')

@section('title', "Perfis da Permissão $permission->name")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>
    </ol>

    <h1>Perfis da Permissão  {{$permission->name}}
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{$profile->name}}
                        </td>
                        <td style="width: 10px">
                            <a class="btn btn-danger" href="{{route('profiles.profiles.detach', [$profile->id, $permission->id])}}">REMOVER</a>
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
