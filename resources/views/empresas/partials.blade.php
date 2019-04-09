<div class="row">
<!-- right column -->
<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Dados Pessoais</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      	<div class="form-group col-xs-4">
      	@if((isset($edit)&&($edit == true))||(isset($editavel)&&($editavel == false)))
      		{!! Form::label('codigo', 'Código') !!}<p>{!! Form::text('codigo',null, ['class' => 'form-control', 'autocomplete' => 'off' ]) !!}
      	@else
			{!! Form::label('codigo', 'Código') !!}<p>{!! Form::text('codigo',Helper::generateUID(), ['class' => 'form-control']) !!}
      	@endif          	
		</div>
		<div class="form-group col-xs-4">
		{!! Form::label('nome_completo', 'Nome completo') !!}<p>
		{!! Form::text('nome_completo',null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group col-xs-4">
		{!! Form::label('naturalidade', 'Naturalidade') !!}<p>
		{!! Form::text('naturalidade',null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group col-xs-4">
	    	<label>Data de nascimento</label><p />		
	    	{!! Form::text('data_nascimento',null, ['class' => 'form-control  datepicker campodata']) !!}
	        <!-- <input class="form-control datepicker campodata" name="data_nascimento"  value="{{ old('data_nascimento')}}" /> -->
	    </div><p></p>
		<div class="form-group col-xs-4">
		{!! Form::label('profissao', 'Profissão') !!}<p>
		{!! Form::text('profissao',null, ['class' => 'form-control']) !!}
		</div><p>
	    <div class="form-group col-xs-4">
	        <label>Estado civil</label><p>
	        <select class="form-control" name="estado_civil">
	            <option>Solteiro(a)</option>
	            <option>Casado(a)</option>
	            <option>Divorciado(a)</option>
	            <option>Viúvo(a)</option>
	            <option>Separado(a)</option>
	            <option>Companheiro(a)</option>
	        </select>
	    </div><p>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Contatos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    	<div class="row">
			<div class="col-xs-3">
			{!! Form::label('email', 'E-mail') !!}
			{!! Form::text('email',null, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('tel_residencial', 'Tel. Residencial') !!}
			{!! Form::text('tel_residencial',null, ['class' => 'form-control campotelefone']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('tel_trabalho', 'Tel. Trabalho') !!}
			{!! Form::text('tel_trabalho',null, ['class' => 'form-control campotelefone']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('tel_recado', 'Tel. Recado') !!}
			{!! Form::text('tel_recado',null, ['class' => 'form-control campotelefone']) !!}
			</div><p>
		</div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  @include('clientes.address',['endereco' => isset($endereco) ? $endereco : null])

</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
