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
<section class="content">
    @if($veruser == "1")
    <div class="col-md-2">
        <a href="{{route('vagas.cadastrar')}}" class="btn btn-primary">
            Cadastrar
        </a>
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
                            @endif
                        </thead>
                        <tbody>


                        @foreach($vagas as $vaga)

                            <tr>

                                <td ><textCargo><a href="/vagas/vaga/{{$vaga->ID}}">{{ $vaga->Cargo }}</a></textCargo>
                                    <p><textVagas>{{ $vaga->Vagas }} vagas</textVagas></p>
                                </td>
                                <td></td>
                                <td>{{ $vaga->Status }}</td>
                                @if($usuario->empresas_id == $vaga->empresas_id)
                                <td>
                                    <a href="/vagas/editar/{{$vaga->ID}}"><span class="glyphicon glyphicon-pencil"></span></a> |
                                    <a href="/vagas/delete/{{$vaga->ID}}"><span class="glyphicon glyphicon-remove"></span></a> </td>
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

</section>
@endsection