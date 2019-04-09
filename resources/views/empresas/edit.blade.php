@extends('layouts.app')
@section('page_heading','Edição de dados do cliente')

@section('main-content')

	@if($errors->any())
	<div class="alert alert-warning">
		<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
	@endif
		
	{!! Form::model($cliente, ['route' => ['clientes.update',$cliente->id], 'method' => 'PUT', 'class' => 'form-inline']) !!}
		
	@include('clientes.partials', ['edit' => true])

	<div class="row">
		<div class="col-md-3">
		{!! Form::submit('Atualizar dados',['class' => 'btn btn-primary']) !!}
		<a href="{{ route('clientes.index') }}" class="btn btn-default">Voltar</a>
		</div>
	</div>

	{!! Form::close() !!}

@stop

