@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection

@section('main-content')
<section class="content">
  <div class="row">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Egressos por região</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">      
        <div style="width: 100%; height: 500px;">
          {!! Mapper::render() !!}
        </div>       
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</section>
@endsection
