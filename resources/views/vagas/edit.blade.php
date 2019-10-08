@extends('layouts.app')

@section('htmlheader_title')
    {{ 'Editar vaga' }}
@endsection

@section('contentheader_title')
    {{ 'Editar vaga' }}
@endsection

@section('contentheader_description')
    {{ 'Revise os dados abaixos da oportunidade!' }}
@endsection

@section('main-content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar</h3>
                    </div>
                    <div class="box-body">

                        @if($errors->any())
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('vagas.edit') }}">
                            {{ csrf_field() }}
                            <input name="id" type="hidden" class="form-control" id="id" value="{{$vaga->id}}">
                            <div align="center">
                                <h4>Dados Básicos</h4>
                                <hr/>
                            </div>

                            <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                <label for="tipo" class="col-md-4 control-label">Tipo de Vaga</label>

                                <div class="col-md-6">
                                    <select id="tipo" class="form-control" name="tipo" value="{{ $vaga->tipo }}" required>
                                        @if($vaga->tipo == "Estágio")
                                            <option value="Estágio" selected>Estágio</option>
                                            <option value="Emprego">Emprego</option>
                                        @else
                                            <option value="Estágio">Estágio</option>
                                            <option value="Emprego" selected>Emprego</option>
                                        @endif

                                    </select>

                                    @if ($errors->has('tipo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                                <label for="cargo" class="col-md-4 control-label">Cargo Oferecido</label>

                                <div class="col-md-6">
                                    <input id="cargo" type="text" class="form-control" name="cargo" value="{{ $vaga->cargo }}" required autofocus>

                                    @if ($errors->has('cargo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                                <label for="descricao" class="col-md-4 control-label">Descrição da Vaga</label>

                                <div class="col-md-6">
                                    <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $vaga->descricao }}" required>

                                    @if ($errors->has('descricao'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('vagas') ? ' has-error' : '' }}">
                                <label for="vagas" class="col-md-4 control-label">Número de Vagas</label>

                                <div class="col-md-6">
                                    <input id="vagas" type="text" class="form-control" name="vagas" value="{{ $vaga->vagas }}" required>

                                    @if ($errors->has('vagas'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('vagas') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Área da vaga</h4>
                                <hr/>
                            </div>

                            <div class="form-group{{ $errors->has('nomeArea') ? ' has-error' : '' }}">
                                <label for="nomeArea" class="col-md-4 control-label">Área</label>

                                <div class="col-md-6">
                                    <input id="nomeArea" type="text" class="form-control" name="nomeArea" placeholder="Ex.: T.I., Departamento de vendas" value="{{ $area->nome }}" required>

                                    @if ($errors->has('nomeArea'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nomeArea') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Remuneração</h4>
                                <hr/>
                            </div>

                            <div class="row" align="center">
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                @if($vaga->acombinar = 1)
                                                    <input type="checkbox" class="faxS" name="acombinar" value="1" checked>
                                                @else
                                                    <input type="checkbox" class="faxS" name="acombinar" value="1">
                                                @endif
                                                Salário a combinar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('faixa_sal_min') ? ' has-error' : '' }}">
                                <label for="faixa_sal_min" class="col-md-4 control-label">Faixa Salarial Mínimo</label>

                                <div class="col-md-6">
                                    <input id="faixa_sal_min" type="text" class="form-control fax" name="faixa_sal_min" value="{{ $vaga->faixa_sal_min }}" >

                                    @if ($errors->has('faixa_sal_min'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('faixa_sal_min') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('faixa_sal_max') ? ' has-error' : '' }}">
                                <label for="faixa_sal_max" class="col-md-4 control-label">Faixa Salarial Máximo</label>

                                <div class="col-md-6">
                                    <input id="faixa_sal_max" type="text" class="form-control fax" name="faixa_sal_max" value="{{ $vaga->faixa_sal_max }}" >

                                    @if ($errors->has('faixa_sal_max'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('faixa_sal_max') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Outros Dados</h4>
                                <hr/>
                            </div>
                            <div class="row" align="center">
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            Há vagas para portador de necessidades especiais?
                                            <label>
                                                @if($vaga->pornecessidade = 1)
                                                <input type="checkbox" name="pornecessidades" class="checkgroupnesc" value="1" checked>
                                                @else
                                                    <input type="checkbox" name="pornecessidades" class="checkgroupnesc" value="1">
                                                @endif
                                                Sim
                                            </label>
                                            <label>
                                                @if($vaga->pornecessidade = 0)
                                                <input type="checkbox" name="pornecessidades" class="checkgroupnesc" value="0" checked>
                                                @else
                                                    <input type="checkbox" name="pornecessidades" class="checkgroupnesc" value="0">
                                                @endif
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" align="center">
                                <div class="col-xs-10">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            Os Curriculos deverão ser enviados por e-mail?
                                            <label>
                                                @if($vaga->recebercurriculos = 1)
                                                <input type="checkbox" name="recebercurriculos" class="checkgroupemail" value="1" checked>
                                                @else
                                                    <input type="checkbox" name="recebercurriculos" class="checkgroupemail" value="1">
                                                @endif
                                                Sim
                                            </label>
                                            <label>
                                                @if($vaga->recebercurriculos = 0)
                                                <input type="checkbox" name="recebercurriculos" class="checkgroupemail" value="0" checked>
                                                @else
                                                    <input type="checkbox" name="recebercurriculos" class="checkgroupemail" value="0">
                                                @endif
                                                Não
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('emailcurriculos') ? ' has-error' : '' }}">
                                <label for="emailcurriculos" class="col-md-4 control-label">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="emailcurriculos" type="email" class="form-control emailc" name="emailcurriculos" value="{{ $vaga->emailcurriculos }}">

                                    @if ($errors->has('emailcurriculos'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('emailcurriculos') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Percentual de Graduação</h4>
                                <hr/>
                            </div>
                            <div class="form-group{{ $errors->has('pergradu_min') ? ' has-error' : '' }}">
                                <label for="pergradu_min" class="col-md-4 control-label">Mínimo</label>

                                <div class="col-md-6">
                                    <input id="pergradu_min" type="text" class="form-control" name="pergradu_min" value="{{ $vaga->pergradu_min }}">

                                    @if ($errors->has('pergradu_min'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pergradu_min') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('pergradu_max') ? ' has-error' : '' }}">
                                <label for="pergradu_max" class="col-md-4 control-label">Máximo</label>

                                <div class="col-md-6">
                                    <input id="pergradu_max" type="text" class="form-control" name="pergradu_max" value="{{ $vaga->pergradu_max }}">

                                    @if ($errors->has('pergradu_max'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pergradu_max') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Local onde será(ão) oferecida(s) a(s) vaga(s)</h4>
                                <hr/>
                            </div>

                            <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                                <label for="cidade" class="col-md-4 control-label">Cidade</label>

                                <div class="col-md-6">
                                    <input id="cidade" type="text" class="form-control" name="cidade" value="{{ $local->cidade }}">

                                    @if ($errors->has('cidade'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                                <label for="bairro" class="col-md-4 control-label">Bairro</label>

                                <div class="col-md-6">
                                    <input id="bairro" type="text" class="form-control" name="bairro" value="{{ $local->bairro }}">

                                    @if ($errors->has('bairro'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                                <label for="estado" class="col-md-4 control-label">Estado</label>

                                <div class="col-md-6">
                                    <input id="estado" type="text" class="form-control" name="estado" value="{{ $local->estado }}" required>

                                    @if ($errors->has('estado'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Benefícios</h4>
                                <hr/>
                            </div>

                            <div class="form-group{{ $errors->has('nomeBenef') ? ' has-error' : '' }}">
                                <label for="nomeBenef" class="col-md-4 control-label">Nome do Benefício</label>

                                <div class="col-md-6">
                                    <input id="nomeBenef" type="text" class="form-control" name="nomeBenef" maxlength="14" value="{{ $beneficio->nome }}" >

                                    @if ($errors->has('nomeBenef'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nomeBenef') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('valorBenf') ? ' has-error' : '' }}">
                                <label for="valorBenf" class="col-md-4 control-label">Valor do Benefício</label>

                                <div class="col-md-6">
                                    <input id="valorBenf" type="text" class="form-control" name="valorBenf" value="{{ $beneficio->valor }}" >

                                    @if ($errors->has('valorBenf'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('valorBenf') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div align="center">
                                <hr/>
                                <h4>Status da Vaga</h4>
                                <hr/>
                            </div>

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label for="status" class="col-md-4 control-label">Status</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control" name="status" value="{{ $vaga->status }}" required>
                                        @if($vaga->status == "Disponível")
                                        <option value="Disponível" selected>Disponível</option>
                                        @else
                                            <option value="Disponível">Disponível</option>
                                        @endif
                                        @if($vaga->status == "Pausada")
                                        <option value="Pausada" selected>Pausada</option>
                                        @else
                                                <option value="Pausada">Pausada</option>
                                        @endif
                                        @if($vaga->status == "Vagas preenchidas")
                                        <option value="Vagas preenchidas" selected>Vagas preenchidas</option>
                                        @else
                                             <option value="Vagas preenchidas">Vagas preenchidas</option>
                                        @endif
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Atualizar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection