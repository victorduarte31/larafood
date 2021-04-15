@extends('adminlte::page')

@section('title', "Perfis do plano $plan->name")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles', $plan->id)}}">Perfis</a></li>
    </ol>

    <h1>Perfis do <strong>{{$plan->name}}</strong><a class="btn btn-dark"
                                                     href="{{route('plans.profiles.available', $plan->id)}}"><i
                class="fas fa-plus"></i> ADICIONAR NOVO PERFIL</a></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="300">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{$profile->name}}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}"
                               class="btn btn-danger">Remover Permissão</a>
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
