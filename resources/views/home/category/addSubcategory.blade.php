@extends('layouts.homeApp')

@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong>Subcategory
            </div>
            <div class="card-body card-block">
                {!! Form::open( ['route' => ['subcategory.store', $id],'class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('subcategory', 'SubCategory',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('subcategory', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('subcategory'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('subcategory') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection
