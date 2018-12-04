@extends('layouts.homeApp')

@section('content')
    @if(session('create'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully add {{session('create')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="breadcrumbs">
        <div class="col-sm-12">
            <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Categories</strong>
                        </div>
                        <div class="card-body">
                            <table id="teachers" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Actions</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{  $category->category }}</td>
                                        <td>
                                            <a href="{{route('add.subcategory', $category->id)}}"
                                               class="btn btn-primary btn-xs">Add Subcategory</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
