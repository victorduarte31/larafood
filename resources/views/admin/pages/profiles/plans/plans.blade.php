@extends('adminlte::page')

@section('title', "Planos do perfil $profile->name")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.plans', $profile->id)}}">Planos</a></li>
    </ol>

    <h1>Planos do Perfil  {{$profile->name}}
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
                        @foreach($plans as $plan)
                            <tr>
                                <td>
                                    {{$plan->name}}
                                </td>
                                <td style="width: 10px">
                                    <a class="btn btn-danger" href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}">REMOVER</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    @if(isset($filters))
                        {{$plans->appends($filters)->links("pagination::bootstrap-4")}}
                    @else
                        {{$plans->links("pagination::bootstrap-4")}}
                    @endif
                </div>
            </div>

@stop
