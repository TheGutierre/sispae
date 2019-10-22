@extends('layouts.app')
@section('page_heading','Edição de dados do cliente')

@section('main-content')

	<div class="row">
		<div class="col-lg-12">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Editar dados da empresa</h3>
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

					<form class="form-horizontal" method="POST" action="{{ route('empresas.edit') }}">
						{{ csrf_field() }}
						<input name="id" type="hidden" class="form-control" id="id" value="{{$user->id}}">
						<div align="center">
							<h4>Dados da Empresa</h4>
							<hr/>
						</div>
						<div class="form-group{{ $errors->has('razao_social') ? ' has-error' : '' }}">
							<label for="razao_social" class="col-md-4 control-label">Razão Social</label>

							<div class="col-md-6">
								<input id="razao_social" type="text" class="form-control" style="color: black;" name="razao_social" value="{{ $empresa->razao_social }}" required autofocus>

								@if ($errors->has('razao_social'))
									<span class="help-block">
                                        <strong>{{ $errors->first('razao_social') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('nome_fantasia') ? ' has-error' : '' }}">
							<label for="nome_fantasia" class="col-md-4 control-label">Nome Fantasia</label>

							<div class="col-md-6">
								<input id="nome_fantasia" type="text" class="form-control" style="color: black;" name="nome_fantasia" value="{{ $empresa->nome_fantasia }}" required>

								@if ($errors->has('nome_fantasia'))
									<span class="help-block">
                                        <strong>{{ $errors->first('nome_fantasia') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
							<label for="cnpj" class="col-md-4 control-label">CNPJ</label>

							<div class="col-md-6">
								<input id="cnpj" type="text" class="form-control" style="color: black;" name="cnpj" value="{{ $empresa->cnpj }}" required>

								@if ($errors->has('cnpj'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cnpj') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('ramo_atuacao') ? ' has-error' : '' }}">
							<label for="ramo_atuacao" class="col-md-4 control-label">Ramo de Atuação</label>

							<div class="col-md-6">
								<input id="ramo_atuacao" type="text" class="form-control" style="color: black;" name="ramo_atuacao" value="{{ $empresa->ramo_atuacao }}" required>

								@if ($errors->has('ramo_atuacao'))
									<span class="help-block">
                                        <strong>{{ $errors->first('ramo_atuacao') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
							<label for="telefone" class="col-md-4 control-label">Telefone 1</label>

							<div class="col-md-6">
								<input id="telefone" type="text" class="form-control" style="color: black;" name="telefone" value="{{ $contato->telefone }}" required>

								@if ($errors->has('telefone'))
									<span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('telefone2') ? ' has-error' : '' }}">
							<label for="telefone2" class="col-md-4 control-label">Telefone 2</label>

							<div class="col-md-6">
								<input id="telefone2" type="text" class="form-control" style="color: black;" name="telefone2" value="{{ $contato->telefone2 }}">

								@if ($errors->has('telefone2'))
									<span class="help-block">
                                        <strong>{{ $errors->first('telefone2') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('emailEmp') ? ' has-error' : '' }}">
							<label for="emailEmp" class="col-md-4 control-label">Email da Empresa</label>

							<div class="col-md-6">
								<input id="emailEmp" type="email" class="form-control" style="color: black;" name="emailEmp" value="{{ $contato->email }}">

								@if ($errors->has('emailEmp'))
									<span class="help-block">
                                        <strong>{{ $errors->first('emailEmp') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
							<label for="logradouro" class="col-md-4 control-label">Endereço da Empresa</label>

							<div class="col-md-6">
								<input id="logradouro" type="text" class="form-control" style="color: black;" name="logradouro" value="{{ $endereco->logradouro }}">

								@if ($errors->has('logradouro'))
									<span class="help-block">
                                        <strong>{{ $errors->first('logradouro') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
							<label for="numero" class="col-md-4 control-label">Número</label>

							<div class="col-md-6">
								<input id="numero" type="text" class="form-control" style="color: black;" name="numero" value="{{ $endereco->numero }}">

								@if ($errors->has('numero'))
									<span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
							<label for="bairro" class="col-md-4 control-label">Bairro</label>

							<div class="col-md-6">
								<input id="bairro" type="text" class="form-control" style="color: black;" name="bairro" value="{{ $endereco->bairro }}">

								@if ($errors->has('bairro'))
									<span class="help-block">
                                        <strong>{{ $errors->first('bairro') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
							<label for="cep" class="col-md-4 control-label">CEP</label>

							<div class="col-md-6">
								<input id="cep" type="text" class="form-control" style="color: black;" name="cep" value="{{ $endereco->cep }}">

								@if ($errors->has('cep'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cep') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('complemento') ? ' has-error' : '' }}">
							<label for="complemento" class="col-md-4 control-label">Complemento</label>

							<div class="col-md-6">
								<input id="complemento" type="text" class="form-control" style="color: black;" name="complemento" value="{{ $endereco->complemento }}">

								@if ($errors->has('complemento'))
									<span class="help-block">
                                        <strong>{{ $errors->first('complemento') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
							<label for="referencia" class="col-md-4 control-label">Ponto de Referência</label>

							<div class="col-md-6">
								<input id="referencia" type="text" class="form-control" style="color: black;" name="referencia" value="{{ $endereco->referencia }}">

								@if ($errors->has('referencia'))
									<span class="help-block">
                                        <strong>{{ $errors->first('referencia') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
							<label for="cidade" class="col-md-4 control-label">Cidade</label>

							<div class="col-md-6">
								<input id="cidade" type="text" class="form-control" style="color: black;" name="cidade" value="{{ $endereco->cidade }}" required>

								@if ($errors->has('cidade'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
							<label for="estado" class="col-md-4 control-label">Estado</label>

							<div class="col-md-6">
								<input id="estado" type="text" class="form-control" style="color: black;" name="estado" value="{{ $endereco->estado }}" required>

								@if ($errors->has('estado'))
									<span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div align="center">
							<hr/>
							<h4>Dados do Responsável</h4>
							<hr/>
						</div>

						<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
							<label for="nome" class="col-md-4 control-label">Nome</label>

							<div class="col-md-6">
								<input id="nome" type="text" class="form-control" style="color: black;" name="nome" value="{{ $responsavel->nome }}" required>

								@if ($errors->has('nome'))
									<span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
							<label for="matricula" class="col-md-4 control-label">CPF</label>

							<div class="col-md-6">
								<input id="cpf" type="text" class="form-control" style="color: black;" name="cpf" maxlength="14" value="{{ $responsavel->cpf }}" required>

								@if ($errors->has('cpf'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
							<label for="cargo" class="col-md-4 control-label">Cargo</label>

							<div class="col-md-6">
								<input id="cargo" type="text" class="form-control" style="color: black;" name="cargo" value="{{ $responsavel->cargo }}" required>

								@if ($errors->has('cargo'))
									<span class="help-block">
                                        <strong>{{ $errors->first('cargo') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
							<label for="status" class="col-md-4 control-label">Status</label>

							<div class="col-md-6">
								<select id="status" class="form-control" name="status" value="{{ $responsavel->status }}" required>
									<option value="1">Ativo</option>

								</select>

								@if ($errors->has('status'))
									<span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div align="center">
							<hr/>
							<h4>Dados de Usuário</h4>
							<hr/>
						</div>

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" style="color: black;" name="email" value="{{ $user->email }}" required>

								@if ($errors->has('email'))
									<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Senha</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" style="color: black;" name="password" required>

								@if ($errors->has('password'))
									<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<label for="password-confirm" class="col-md-4 control-label">Confirmação de Senha</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" style="color: black;" name="password_confirmation" required>
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

@stop

