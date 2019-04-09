@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Matriculados</span>
	              <span class="info-box-number">0</span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Desistentes</span>
	              <span class="info-box-number">0</span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->

	        <!-- fix for small devices only -->
	        <div class="clearfix visible-sm-block"></div>

	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Concludentes</span>
	              <span class="info-box-number">1107</span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>
	        <!-- /.col -->
	        <div class="col-md-3 col-sm-6 col-xs-12">
	          <div class="info-box">
	            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

	            <div class="info-box-content">
	              <span class="info-box-text">Transferidos</span>
	              <span class="info-box-number">0</span>
	            </div>
	            <!-- /.info-box-content -->
	          </div>
	          <!-- /.info-box -->
	        </div>

	        <!-- /.col -->
	      </div>
	
	</div>
@endsection
