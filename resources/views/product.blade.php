@extends('layouts.admin')
@section('content')
@include('productAddModal')
<div class="wrapper" id="wrapper">
@include('layouts.Sidebar')
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
                      <th>Image</th>
                      <th>Name</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody id="productTbody">
                    @foreach($productData as $prdDatas)
                    <tr>
                      <td>
                      @if($prdDatas->image)
                        <img src="{{ asset('public/images/'.$prdDatas->image)}}" alt="photo" style="height: 50px; width: 50px;">
                        @else
                        <img src="{{ asset('public/images/profile-picture-circle.png')}}" alt="photo" style="height: 50px; width: 50px;">
                      @endif
                      </td>
                      <td>{{$prdDatas->name}}</td>
                      <td>{{$prdDatas->price}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
@include('layouts.footer')
@endsection