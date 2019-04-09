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
    <div class="col-md-2">
        <a href="{{route('vagas.cadastrar')}}" class="btn btn-primary">
            Cadastrar
        </a>
    </div>
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
                        <th>Opções</th>
                        </thead>
                        <tbody>

                        @foreach($estagios as $estagio)

                            <tr>
                                <td><textCargo>{{ $estagio->Cargo }}</textCargo>
                                    <p><textVagas>{{ $estagio->Vagas }} vagas</textVagas></p>
                                </td>
                                <td></td>
                                <td>{{ $estagio->Status }}</td>
                                <td><a href="/vagas/editar/{{$estagio->ID}}">Editar</a> |
                                    <a href="/vagas/delete/{{$estagio->ID}}">Excluir</a> </td>
                            </tr>
                        @endforeach
                        @foreach($empregos as $emprego)

                            <tr>
                                <td><textCargo>{{ $emprego->Cargo }}</textCargo>
                                    <p><textVagas>{{ $emprego->Vagas }} vagas</textVagas></p>
                                </td>
                                <td></td>
                                <td>{{ $emprego->Status }}</td>
                                <td><a href="/vagas/editar/{{$emprego->ID}}">Editar</a> |
                                    <a href="/vagas/delete/{{$emprego->ID}}">Excluir</a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-offset-5">
            {!! $estagios->links() !!}
        </div>

    </div>

</section>
@endsection