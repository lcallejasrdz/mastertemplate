@extends('admin.layouts.sbadmin')

@section('title', '| '.$word)

@section('styles')
@endsection

@section('page-header', $word)

@section('panel-heading')
    <i class="fa fa-plus fa-fw"></i> {{ trans('crud.sidebar.add') }}
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{ route($active.'.store') }}">
                @include('admin.modules.'.$active)
                <input type="submit" class="btn btn-primary" value="{{ trans('crud.create.add') }}">
            </form>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('scripts')
@endsection