@extends('layouts.app')

@section('htmlheader_title')
    {{$vaga->cargo}} em {{ $empresa->nome_fantasia }}
@endsection

@section('contentheader_title')
    {{ '' }}
@endsection

@section('contentheader_description')
    {{ '' }}
@endsection

@section('main-content')
    <section class="content">
        @if (Session::has('message1'))
            <div class="alert alert-info">{{ Session::get('message1') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-12">

                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center;">
                        <h3 class="box-title">{{$vaga->cargo}}</h3>

                    </div>
                    <div class="box-body">
                        <div style="text-align: center;">
                            <textV>{{ $vaga->vagas }} vagas</textV>
                             ||
                            <textV>{{ $empresa->nome_fantasia }}</textV>
                        </div>

                        <table class="table table-responsive">
                            <thead>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        <div>
                                            <p>Salário</p>
                                            <ul>
                                                @if($vaga->acombinar == "1")
                                                    <li><h5>A combinar</h5></li>
                                                @else
                                                    <li><h5>De R${{$vaga->faixa_sal_min}} a R${{$vaga->faixa_sal_max}}</h5></li>
                                                @endif
                                            </ul>
                                            <p>Percentual de graduação necessária</p>
                                            <ul>
                                                <li><h5>De {{$vaga->pergradu_min}}% a {{$vaga->pergradu_max}}%</h5></li>
                                            </ul>
                                            <p>Status</p>
                                            <ul>
                                                <li><h5>{{$vaga->status}}</h5></li>
                                            </ul>
                                            <p>Beneficios</p>
                                            <ul>
                                                @if(empty($beneficios->nome))
                                                    <li><h5>Não há benefícios para esta vaga!</h5></li>
                                                @else
                                                    <li><h5>{{$beneficios->nome}}</h5></li>
                                                    <li><h5>{{$beneficios->valor}}</h5></li>
                                                @endif
                                            </ul>
                                            <p>E-mail para envio de currículo</p>
                                            <ul>
                                                @if($vaga->recebercurriculos == "0")
                                                    <li><h5>Não há e-mail para envio de currículo!</h5></li>
                                                @else
                                                    <li><h5>{{$vaga->emailcurriculos}}</h5></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <p>Descrição:</p>
                                        <h5 style="text-align: justify;">{{$vaga->descricao}}</h5>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <p style="text-align: center;">Local da Vaga:</p>
                                        <h5 style="text-align: center;">{{$local->bairro}}, {{$local->cidade}}, {{$local->estado}}</h5>
                                    </td>
                                    <td>

                                        @if($veruser == "0")
                                        @if($verifica == "1")
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="button" class="btn btn-danger">
                                                    Você já se candidatou a esta vaga. Boa sorte!
                                                </button>
                                            </div>
                                        @else
                                        <form method="POST" action="{{ route('vagas.vaga') }}">
                                            {{ csrf_field() }}
                                            <input name="id" type="hidden" class="form-control" id="id" value="{{$vaga->id}}">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Candidatar-se a esta vaga!
                                                </button>
                                            </div>
                                        </form>
                                        @endif
                                            @else
                                            ...
                                            @endif
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection