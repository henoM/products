@extends('layouts.app')

@section('content')
    @if(session('add'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully add  {{session('add')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('danger'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{session('danger')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            You successfully add  {{session('update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">{{$product->name}}</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="mx-auto d-block">
                                        <img  src="{{url('/files/attachment'.$product->id.'/'.$product->files->first()->path)}}" alt="Card image cap">
                                        <h5 class="text-sm-center mt-2 mb-1">{{$product->upc}}</h5>
                                        <div class="location text-sm-center"> {{$product->brand}}, {{$product->size}},{{$product->case_count}}</div>
                                        <div class="location text-sm-center"> {{$product->description}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="row">
                                    @foreach($product->files as $file)
                                        @if(strlen($file->path) == 40)
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="mx-auto d-block">
                                                        <video width="200" height="200" poster="{{url('/files/attachment'.$product->id.'/l'.$file->path.'.gif')}}" controls>
                                                            <source src="{{url('/files/attachment'.$product->id.'/'.$file->path.'.mp4')}}" type="video/mp4">
                                                        </video>
                                                        {{--<img  src="{{url('/files/attachment'.$product->id.'/'.$file->path)}}" alt="Card image cap">--}}
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <div class="card-body">
                                                    <div class="mx-auto d-block">
                                                        <img  src="{{url('/files/attachment'.$product->id.'/'.$file->path)}}" alt="Card image cap">
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
