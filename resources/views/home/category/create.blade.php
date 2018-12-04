@extends('layouts.homeApp')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong>Category
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'category.store','class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('category', 'Category',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('category', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('category'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('category') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection
