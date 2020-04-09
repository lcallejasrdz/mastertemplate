<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CRUDController extends Controller
{
    public function __construct()
    {
        $this->active = \Request::route()->getName();

        // Index
        $this->model = trans('module_'.$this->active.'.controller.model');
        $this->select = trans('module_'.$this->active.'.controller.select');
        $this->word = trans('module_'.$this->active.'.controller.word');
        $this->columns = Arr::add($this->select, count($this->select), 'actions');
        // 1 = (show, edit, delete)
        // 2 = (show, edit)
        // 3 = (show, delete)
        // 4 = (edit, delete)
        // 5 = (show)
        // 6 = (edit)
        // 7 = (delete)
        $this->actions = 1;

        // Final compact
        $this->compact = ['view', 'active', 'model', 'select', 'word', 'columns', 'actions'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = 'index';

        $active = $this->active;
        $model = $this->model;
        $select = $this->select;
        $word = $this->word;
        $columns = $this->columns;
        $actions = $this->actions;

        return view('admin.crud.list', compact($this->compact));
    }
}
