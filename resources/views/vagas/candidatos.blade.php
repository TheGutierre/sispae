@extends('layouts.app')

@section('htmlheader_title')
    {{ 'Candidatos' }}
@endsection

@section('contentheader_title')
    {{ 'Candidatos' }}
@endsection

@section('contentheader_description')
    {{ '' }}
@endsection

@section('main-content')
    <section class="content">
        @if($veruser == "1")
            <div class="col-md-1">
                <a href="{{route('vagas.minhasVagas')}}" class="btn btn-adn">
                    Minhas Vagas Disponibilizadas
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
                            <th>Nome</th>
                            <th>E-mail</th>

                            </thead>
                            <tbody>


                            @foreach($candidatos as $candidato)

                                <tr>

                                    <td ><p>{{$candidato->name}}</p>
                                    </td>
                                    <td ><p>{{$candidato->email}}</p>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-offset-5">
                {!! $candidatos->links() !!}
            </div>

        </div>

    </section>
@endsection