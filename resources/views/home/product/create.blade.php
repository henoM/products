@extends('layouts.homeApp')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong>Product
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'product.store','class' => 'form-horizonta','enctype'=>'multipart/form-data']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('upc', 'UPC',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('upc', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('upc'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('upc') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('case_count', 'Case Count',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::number('case_count', null, ['min'=>0, 'class' => 'form-control'])!!}
                        @if ($errors->has('case_count'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('case_count') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('name', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('description', 'Description',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!! Form::textarea('description',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
                        @if ($errors->has('description'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('description') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('brand', 'Brand',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('brand', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('brand'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('brand') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('size', 'Size',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('size', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('size'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('size') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Image',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::file('file', null, ['class' => 'imgInp form-control','id'=>'imgInp'])!!}<br>
                        @if ($errors->has('file'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('file') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Skills',['class' => 'form-control-label'])!!}
                    </div>
                    <div class="col-12 col-md-9">
                        {!! Form::select('categories_id', $categories ,null,['class' => 'form-control-sm form-control'])!!}
                        @if ($errors->has('categories'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('categories') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection
