<div class="box box-info">
	<div class="box-header with-border">
	  <h3 class="box-title">Endereço</h3>
	</div>

	<!-- /.box-header -->
	<div class="box-body">
    	<div class="row">
			<div class="col-xs-3">
			{!! Form::label('endereco', 'Endereço') !!}
			{!! Form::text('endereco',old('endereco', (isset($endereco) ? $endereco->endereco : null)), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('numero', 'Número') !!}
			{!! Form::text('numero',old('numero', (isset($endereco) ? $endereco->numero : null)), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('bairro', 'Bairro') !!}
			{!! Form::text('bairro',old('bairro', (isset($endereco) ? $endereco->bairro : null)), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-3">
			{!! Form::label('cep', 'CEP (Endereçamento postal)	') !!}
			{!! Form::text('tel_recado',null, ['class' => 'form-control campocep']) !!}
			</div>
		</div>
		<p></p>
		<div class="row">		
			<div class="form-group col-sx-4">
				{!! Form::label('cidade', 'Cidade') !!}
				{!! Form::text('cidade',old('cidade', (isset($endereco) ? $endereco->cidade : null)), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-4">
				{!! Form::label('estado', 'Estado') !!}
				{!! Form::text('estado',old('estado', (isset($endereco) ? $endereco->estado : null)), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group col-xs-4">
				{!! Form::label('referencia', 'Referência') !!}
				{!! Form::text('referencia',old('referencia', (isset($endereco) ? $endereco->referencia : null)), ['class' => 'form-control']) !!}
			</div>
		</div>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->