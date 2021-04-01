@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes</a></li>
    </ol>

    <h1>Detalhes do plano {{$plan->name}} <a class="btn btn-dark" href="{{route('details.plan.create', $plan->url)}}"><i
                class="fas fa-plus"></i> Adicionar novo detalhe </a></h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="400">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $detail)
                    <tr>
                        <td>
                            {{$detail->name}}
                        </td>
                        <td style="width: 10px">
                            <a href="{{route('details.plan.edit', [$plan->url, $detail->id])}}" class="btn btn-warning">Editar detalhe</a>
                            <a href="{{route('details.plan.show', [$plan->url, $detail->id])}}" class="btn btn-info">Ver detalhes do plano</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {{$details->appends($filters)->links("pagination::bootstrap-4")}}
            @else
                {{$details->links("pagination::bootstrap-4")}}
            @endif
        </div>
    </div>

@stop
