@extends('layouts.homeApp')

@section('content')
    @if(session('create'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully add  {{session('create')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('delete'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Success</span>
            You successfully   {{session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-12">
            <a href="{{route('product.create')}}" class="btn btn-primary">Add Product</a>
            <a href="{{route('product.create.csv')}}" class="btn btn-primary">Add Product to csv file</a>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">{{$product->name}}</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img  src="{{url('/files/attachment'.$product->id.'/'.$product->files->first()->path)}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{$product->upc}}</h5>
                                    <div class="location text-sm-center"> {{$product->brand}}, {{$product->size}},{{$product->case_count}}</div>
                                    <div class="location text-sm-center"> {{$product->description}}</div>
                                </div>
                                <hr>
                                <a href="{{route('product.view', $product->id)}}" class="btn btn-primary btn-xs">view</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
