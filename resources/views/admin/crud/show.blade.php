@extends('admin.layouts.sbadmin')

@section('title', '| '.$word)

@section('styles')
@endsection

@section('page-header', $word)

@section('panel-heading')
    <i class="fa fa-file-alt fa-fw"></i> {{ trans('crud.read.title') }}
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        @foreach($item as $column => $value)
                            <tr>
                                <th>
                                    {{ ucfirst(trans('validation.attributes.'.$column)) }}
                                </th>
                                <td>
                                    @if(($column == 'last_login' && $value != "") || ($column == 'created_at' && $value != "") || ($column == 'updated_at' && $value != "") || ($column == 'deleted_at' && $value != ""))
                                        {{ \Carbon\Carbon::parse($value)->diffForHumans() }}
                                    @else
                                        {{ $value }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection