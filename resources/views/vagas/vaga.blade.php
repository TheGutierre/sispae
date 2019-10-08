@extends('layouts.app')

@section('htmlheader_title')
    {{ '' }}
@endsection

@section('contentheader_title')
    {{ '' }}
@endsection

@section('contentheader_description')
    {{ '' }}
@endsection

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <div class="box box-primary">
                    <div class="box-header with-border" style="text-align: center;">
                        <h3 class="box-title">{{$vaga->cargo}}</h3>
                    </div>
                    <div class="box-body">
                        <p style="text-align: center;"><textVagas>{{ $vaga->vagas }} vagas</textVagas></p>
                        <p style="text-align: center;"><textVagas>{{ $empresa->nome_fantasia }}</textVagas></p>
                        <table class="table table-responsive">
                            <thead>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        <div class="toc">
                                            <p>Salário</p>
                                            <ul>
                                                <li><h5>De R${{$vaga->faixa_sal_min}} a R${{$vaga->faixa_sal_max}}</h5></li>
                                            </ul>
                                            <p>Percentual de graduação necessária</p>
                                            <ul>
                                                <li><h5>De {{$vaga->pergradu_min}}% a {{$vaga->pergradu_max}}%</h5></li>
                                            </ul>
                                            <p>Status</p>
                                            <ul>
                                                <li><h5>{{$vaga->status}}</h5></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$vaga->descricao}}</h5>
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