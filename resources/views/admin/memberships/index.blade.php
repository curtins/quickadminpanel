@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.membership.title')</h3>
    @can('membership_create')
    <p>
        <a href="{{ route('admin.memberships.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($memberships) > 0 ? 'datatable' : '' }} @can('membership_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('membership_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.membership.fields.gvr-number')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($memberships) > 0)
                        @foreach ($memberships as $membership)
                            <tr data-entry-id="{{ $membership->id }}">
                                @can('membership_delete')
                                    <td></td>
                                @endcan

                                <td field-key='gvr_number'>{{ $membership->gvr_number }}</td>
                                                                <td>
                                    @can('membership_view')
                                    <a href="{{ route('admin.memberships.show',[$membership->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('membership_edit')
                                    <a href="{{ route('admin.memberships.edit',[$membership->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('membership_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.memberships.destroy', $membership->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('membership_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.memberships.mass_destroy') }}';
        @endcan

    </script>
@endsection