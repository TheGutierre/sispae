@extends('layouts.app')

@section('htmlheader_title')
    {{ 'Vagas Disponíveis' }}
@endsection

@section('contentheader_title')
    {{ 'Vagas Disponíveis' }}
@endsection

@section('contentheader_description')
    {{ '' }}
@endsection

@section('main-content')

    @if($veruser == "1")
    <div class="col-md-auto col-lg-5">
        <a href="{{route('vagas.cadastrar')}}" class="btn btn-primary">
            Cadastrar
        </a>
        <a href="{{route('vagas.minhasVagas')}}" class="btn btn-adn">
            Minhas Vagas Disponibilizadas
        </a>
    </div>
        <div class="col-md-2">

        </div>
    @endif

    <div class="col-md-12 col-md-offset-0">

        <div class="panel panel-default">
            <div class="panel-heading">Vagas Disponíveis

            </div>

            <div class="panel-body">
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th></th>
                        <th></th>
                        <th>Status</th>
                        @if($veruser == "1")
                        <th>Opções</th>
                            @else
                            <th></th>
                            @endif
                        </thead>
                        <tbody>


                        @foreach($vagas as $vaga)

                            <tr>


                                <td ><textCargo><a href="/vagas/vaga/{{$vaga->ID}}">{{ $vaga->Cargo }} </a></textCargo>
                                    <p><textVagas>{{ $vaga->Vagas }} vagas</textVagas></p>
                                </td>
                                <td></td>
                                <td style="width: 2%">{{ $vaga->Status }}</td>
                                @if($usuario->empresas_id == $vaga->empresas_id)
                                <td style="width: 10%">
                                    <a href="/vagas/editar/{{$vaga->ID}}"><span class="glyphicon glyphicon-pencil"></span></a> |
                                    <a href="/vagas/delete/{{$vaga->ID}}"><span class="glyphicon glyphicon-remove"></span></a> </td>
                                @else
                                    @if(Auth::user()->tipo == "egresso")
                                    @foreach($verifica as $ver)
                                        @if($ver->vagas_id == $vaga->ID)
                                            <td style="width: 2%">
                                                <div class="col-md-auto">
                                                    <button class="btn btn-danger">
                                                        Candidatou-se
                                                    </button>
                                                </div>
                                            </td>
                                        @endif

                                    @endforeach
                                        @endif
                                @endif

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-offset-5">
            {!! $vagas->links() !!}
        </div>

    </div>


@endsection