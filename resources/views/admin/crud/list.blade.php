@extends('admin.layouts.sbadmin')

@section('title', '| '.$word)

@section('styles')
@endsection

@section('page-header', $word)

@section('panel-heading')
    <i class="fa fa-list fa-fw"></i> {{ trans('crud.sidebar.list') }}
@endsection

@section('content')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            {{ Form::token() }}
            @include('admin.modules.datatable')
        </div>
    </div>
@endsection

@section('modals')
    @include('admin.layouts.modals.delete_modal')
    @include('admin.layouts.modals.restore_modal')
@endsection

@section('scripts')
    {{-- DataTables --}}
    @include('plugins.datatables.dataTables')
@endsection