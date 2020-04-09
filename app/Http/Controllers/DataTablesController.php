<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use App\User;

class DataTablesController extends Controller
{
    public function data(Request $request){
        if(\App::getLocale() == 'es'){
            $language = 'es';
        }else{
            $language = 'en';
        }
        Carbon::setLocale($language);
        $active = $request->active;
        $model = $request->model;
        $view = $request->view;
        $actions_value = $request->actions;
        if($view == 'index'){
            $full_model = 'App\\View'.$request->model;
        }else{
            $full_model = 'App\\ViewDeleted'.$request->model;
        }
        $rows = $full_model::data();

        return Datatables::of($rows)
            ->editColumn('created_at', '{!! \Carbon\Carbon::parse($created_at)->diffForHumans() !!}')
            ->addColumn('actions', function($row) use ($active, $view, $actions_value){
                if($view == 'index'){
                    // 1 = (show, edit, delete)
                    // 2 = (show, edit)
                    // 3 = (show, delete)
                    // 4 = (edit, delete)
                    // 5 = (show)
                    // 6 = (edit)
                    // 7 = (delete)
                    $actions = '';
                    if($actions_value == 1 || $actions_value == 2 || $actions_value == 3 || $actions_value == 5){
                        // $actions .= '<a href='. route($active.'.show', $row->id) .'><i class="fa fa-info fa-fw text-primary" title="view"></i></a>';
                        $actions .= ' <a href="#" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>';
                    }
                    if($actions_value == 1 || $actions_value == 2 || $actions_value == 4 || $actions_value == 6){
                        // $actions .= '<a href='. route($active.'.edit', $row->id) .'><i class="fa fa-edit fa-fw text-success" title="edit"></i></a>';
                        $actions .= ' <a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-edit"></i></a>';
                    }
                    if($actions_value == 1 || $actions_value == 3 || $actions_value == 4 || $actions_value == 7){
                        // $actions .= '<a href="#" data-toggle="modal" data-target="#delete_modal" onClick="deleteModal('.$row->id.')"><i class="fa fa-remove fa-fw text-danger" title="delete"></i></a>';
                        $actions .= ' <a href="#" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>';
                    }
                }else{
                	$actions = '';
                    $actions .= ' <a href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-exclamation-triangle"></i></a>';
                    // $actions = '<a href="#" data-toggle="modal" data-target="#restore_modal" onClick="restoreModal('.$row->id.')"><i class="fa fa-repeat fa-fw text-warning" title="delete"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
