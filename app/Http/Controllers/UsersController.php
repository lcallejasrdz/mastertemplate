<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Redirect;
use App\Http\Requests\UserRequest as MasterRequest;
use Illuminate\Support\Str as Str;
use Sentinel;
use Activation;

class UsersController extends Controller
{
    public function __construct()
    {
        // General
        $this->active = explode('.',\Request::route()->getName())[0];
        $this->model = trans('module_'.$this->active.'.controller.model');
        $this->create_fields = trans('module_'.$this->active.'.controller.create_fields');
        $this->full_model = 'App\\'.$this->model;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MasterRequest $request)
    {
        $item = $this->full_model::create($request->only($this->create_fields));

        /* Slug */
        $item->slug = Str::slug($item->first_name.' '.$item->last_name.' '.$item->id);

        $user = Sentinel::findById($item->id);
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        /* Extras */
        $role = Sentinel::findRoleById($request->role_id);
        $role->users()->attach($item);

        /* Slug */
        $item->slug = Str::slug($item->name.' '.$item->id);

        if($item->save()){
            return Redirect::route($this->active.'.create')->with('success', trans('crud.create.message.success'));
        }else{
            $item->forceDelete();
            return Redirect::back()->with('error', trans('crud.create.message.error'));
        }
    }
}
