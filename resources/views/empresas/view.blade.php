@extends('layouts.app')

@section('page_heading','Visualização de dados do cliente')

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados sobre {{$cliente->nome_completo}}</h3>
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
				
			{!! Form::model($cliente, ['route' => ['clientes.update',$cliente->id], 'class' => 'form-inline']) !!}
				
			@include('clientes.partials',['editavel' => false])
			
			{!! Form::close() !!}

			
		</div>		
	</div>
	<a href="{{ route('clientes.index') }}" class="btn btn-default">Voltar</a>
</div>

@stop

