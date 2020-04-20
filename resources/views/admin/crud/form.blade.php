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
        	@if($view == 'create')
            	<form method="post" action="{{ route($active.'.store') }}">
            @else
            	<form method="post" action="{{ route($active.'.update', ['id' => $item->id]) }}">
	            	<input type="hidden" name="_method" value="PUT">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            @endif
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