@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Consulta de egressos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">              
              <div class="row">
              <div class="col-sm-12">

              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                	<th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 181px;">R.A.</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">Nome</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 198px;">Curso</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 155px;">Data conclusão</th>
                	<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 112px;">Status</th></tr>
                </thead>
                <tbody>
                <?php $odd=true; ?>
                @foreach($egressos as $egresso)

                	@if($odd=!$odd) 
                	<tr role="row" class="odd">
                	@else
					       <tr role="row" class="even">
	                @endif                
	                  <td class="sorting_1">{{$egresso->RA}}</td>
	                  <td>{{$egresso->NOME}}</td>
	                  <td>{{$egresso->CURSO}}</td>
	                  <td>{{$egresso->DATA_FIM}}</td>
	                  <td>{{$egresso->STATUS}}</td>
	                </tr>

                @endforeach

				        </tbody>
                <!-- <tfoot>
                  <tr>
  	                <th rowspan="1" colspan="1">R.A.</th>
  	                <th rowspan="1" colspan="1">Nome</th>
  	                <th rowspan="1" colspan="1">Curso</th>
  	                <th rowspan="1" colspan="1">Data conclusão</th>
  	                <th rowspan="1" colspan="1">Status</th>
                  </tr>
                </tfoot> -->
              </table>


              </div></div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
