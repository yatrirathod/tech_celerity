@extends('layouts.admin')

@section('content')
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
#piechartdiv {
    width: 100%;
  height: 500px;
}
</style>
      <!-- Main Content -->
      <div id="wrapper">
        @include('layouts.sidebar')
      <div id="content">
        @include('layouts.header')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
         <!-- Content Row -->
          <div class="row">
          <!-- User Card Example -->
          <div class="col-xl-6">
              <h2>Product's List</h2>
              <dl>
          @foreach($Product as $prd)
                <dt>=> Product</dt>
                <dd>- {{$prd->name}}</dd>
                <dt>Price</dt>
                <dd>- {{$prd->price}}</dd>
            @endforeach
              </dl>  
            </div>
           
          </div>

          <!-- Content Row -->
         
          <div class="row">
            <!-- <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
            <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
            <link href="{{ asset('public/css/morish.css') }}" rel="stylesheet">

            <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
          </div>
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            

            <!-- <div class="col-lg-6 mb-4"> -->

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
              </div>

            <!-- </div> -->
          </div>

        </div>
      
        <!-- /.container-fluid -->
        @include('layouts.footer')
        <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
        <script src="https://www.amcharts.com/lib/3/serial.js"></script>
        <script src="http://www.amcharts.com/lib/3/pie.js"></script>
        <script src="https://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
        <script src="{{ asset('public/js/morish.js')}}" type="text/javascript"></script>
@endsection
