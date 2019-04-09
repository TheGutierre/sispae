@extends('layouts.app')

@section('htmlheader_title')
	{{ 'Gerenciamento de clientes' }}
@endsection

@section('contentheader_title')
	{{ 'Gerenciamento de clientes' }}
@endsection

@section('page_heading','Clientes')

@section('main-content')

<div class="row">
    <div class="col-xs-12">	        
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Todos os clientes</h3>

          @can('editaClientes')
          <div class="box-tools">
          	<a href="{{route('clientes.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Novo cliente</a>
            <!-- <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Pesquisar">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>              	 -->
          </div>
          @endcan
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-hover" id="customer_table">
          	<thead>
	            <tr>
	            	<th>Código</th>
					<th>Nome</th>
					<th>Profissão</th>
					<th>Naturalidade</th>
					<th>Ações</th>
	            </tr>
            </thead>
            <tbody>
	            @if(count($clientes) < 1)
				<tr>
					<td class="text-center" colspan="6">
						Sem dados cadastrados no momento
					</td>
				</tr>
				@else

				@foreach($clientes as $cliente)
				<tr>
					<td>{{$cliente->codigo}}</td>
					<td>{{$cliente->nome_completo}}</td>
					<td>{{$cliente->profissao != "" ? $cliente->profissao : '- não informada -'}}</td>
					<td>{{$cliente->naturalidade != "" ? $cliente->naturalidade : '- não informada -'}}</td>
					<td>
					    <div class="btn-group btn-group-sm" role="group" aria-label="...">
					        <a href="{{route('clientes.show', ['id' => $cliente->id])}}" class="btn btn-default" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
					        @can('editaClientes')
					        <a href="{{route('clientes.edit', ['id' => $cliente->id])}}" class="btn btn-default" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
					        {!! Form::open(['route' => ['clientes.destroy',$cliente->id], 'class' => 'pull-right']) !!}
					  		{!! Form::hidden('_method', 'DELETE') !!}
					  			<button type="submit" class="btn btn-danger btn-remove-fix" data-toggle="tooltip" title="Excluir"><i class="fa fa-trash-o"></i></button>
					  		{!! Form::close() !!}
					  		@endcan
					    </div>
					</td>
				</tr>
				@endforeach

				@endif
			</tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer clearfix">
        	<h6 class="no-margin pull-right">Exibindo de 0 a 0 de 0 processos</h6>					
        </div> -->
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
</div>

@endsection
@if(count($clientes) > 0)
@section('pagespecificstyles')
<script type="text/javascript">
	$(document).ready(function(){
		if ( $.fn.dataTable.isDataTable( '#customer_table' ) ) {
		    table = $('#customer_table').DataTable();
		}
		else {
		    table = $('#customer_table').DataTable( {
		        "paging": true,
		        "language": {
		            "url": "/plugins/datatables/Portuguese-Brasil.json"
		        }
		    });
		}
	});
</script>	
@endsection
@endif
@section('custom_style')
<style>
	.btn-remove-fix { padding: 4px 10px; }
</style>
@endsection