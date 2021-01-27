@extends('layouts.admin')
@section('content')
<div class="wrapper" id="wrapper">
@include('layouts.Sidebar')
<div id="content">
	@include('layouts.header')
		<!-- DataTales Example -->
		 <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
        </div>
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="prdTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="productTbody">
                    @foreach($categoryData as $catDatas)
                    <tr>
                      <td>{{$catDatas->name}}</td>
                      <td>{{$catDatas->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
@include('layouts.footer')
@endsection