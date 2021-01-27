@extends('layouts.admin')
@section('content')

<div class="wrapper" id="wrapper">
@include('layouts.adminSidebar')
<div id="content">
	@include('layouts.header')
		<!-- DataTales Example -->
		 <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Product Table</h6>
        </div>
          <div class="card shadow mb-4">
          	<button type="button" class="btn btn-primary badge-pill" id="addProductdata" style="margin-left: 4%;margin-top: 10px;width: 94px;">ADD</button>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="prdTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody id="productTbody">
                    @foreach($categoryData as $catDatas)
                    <tr>
                      <td>{{$catDatas->CategoryName}}</td>
                      <td>{{$catDatas->CNT}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
@include('layouts.footer')
@endsection