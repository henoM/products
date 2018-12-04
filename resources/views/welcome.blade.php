@extends('layouts.mainApp')

@section('content')

        <div class="container">
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
                                    <a href="{{route('main.product.view', $product->id)}}" class="btn btn-primary btn-xs">view</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </div>
@endsection
