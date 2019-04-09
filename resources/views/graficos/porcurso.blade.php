@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection

@section('main-content')
<section class="content">
  <div class="row">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Egressos por curso</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">      
        <div style="width: 60%;">
          <canvas id="pieChart" height="500" width="600"></canvas>           
        </div>       
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</section>
@endsection
@section('pagespecificstyles')
<script src="{{ asset ('js/Chart.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  window.onload = function() {

  var ctx = document.getElementById("pieChart");
  // var ctx = $("#pieChart");
  var data = {
      labels: [
          "Administração",
          "Direito",
          "Gestão Comercial",
          "Ciências Contáveis",
          "Sistemas de Informação"
      ],
      datasets: [
          {
              data: [{{$adm}}, {{$dir}}, {{$cont}}, {{$gest}}, {{$sis}}],
              
              backgroundColor: [
                  "#1E2460",
                  "#FF6384",
                  "#cc0000",
                  "#E5BE01",
                  "#2271B3"
              ],
              hoverBackgroundColor: [
                  "#1E2460",
                  "#FF6384",
                  "#cc0000",
                  "#E5BE01",
                  "#2271B3"
              ]
          }]
  };
  var myPieChart = new Chart(ctx,{
      type: 'pie',
      data: data,
      // options: options
  });

}
</script>
@endsection