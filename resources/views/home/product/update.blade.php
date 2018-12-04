@extends('layouts.homeApp')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong>Product
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => ['product.edit',$product->id],'method' => 'put','class' => 'form-horizonta','enctype'=>'multipart/form-data']) !!}
                <div class="row form-group">
                    <div
                        class="col col-md-3">{!!  Form::label('case_count', 'Case Count',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::number('case_count', $product->case_count, ['min'=>0, 'class' => 'form-control'])!!}
                        @if ($errors->has('case_count'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('case_count') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div
                        class="col col-md-3">{!!  Form::label('name', 'Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('name',$product->name, ['class' => 'form-control'])!!}
                        @if ($errors->has('name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div
                        class="col col-md-3">{!!  Form::label('description', 'Description',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!! Form::textarea('description',$product->description,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
                        @if ($errors->has('description'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('description') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div
                        class="col col-md-3">{!!  Form::label('brand', 'Brand',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('brand',$product->brand, ['class' => 'form-control'])!!}
                        @if ($errors->has('brand'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('brand') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div
                        class="col col-md-3">{!!  Form::label('size', 'Size',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('size', $product->size, ['class' => 'form-control'])!!}
                        @if ($errors->has('size'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('size') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Skills',['class' => 'form-control-label'])!!}
                    </div>
                    <div class="col-12 col-md-9">
                        {{--{!! Form::select('categories_id', $categories ,null,['class' => 'form-control-sm form-control'])!!}--}}
                        @if ($errors->has('categories'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('categories') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>

                <div
                    class="form-actions form-group"> {!!  Form::submit('update', ['class' => 'btn btn-primary'])!!}</div>
                {{--{!! Form::close() !!}--}}
            </div>
        </div>
    </div>
@endsection
