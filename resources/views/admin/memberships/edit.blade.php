@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.membership.title')</h3>
    
    {!! Form::model($membership, ['method' => 'PUT', 'route' => ['admin.memberships.update', $membership->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gvr_number', trans('quickadmin.membership.fields.gvr-number'), ['class' => 'control-label']) !!}
                    {!! Form::number('gvr_number', old('gvr_number'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gvr_number'))
                        <p class="help-block">
                            {{ $errors->first('gvr_number') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

