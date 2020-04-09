<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /**
     * @test
     */
    function itLoadsTheUsersListPage()
    {
        $route = 'users';
        $title = trans('module_'.$route.'.controller.word');

        $this->get('/'.$route)
            ->assertStatus(200)
            ->assertSee($title);
    }

    /**
     * @test
     */
    function itLoadsTheUserDetailPage()
    {
        $user = 'eduardo-callejas';
        $route = 'users';
        $word = trans('crud.read.title');

        $this->get('/'.$route.'/'.$user)
            ->assertStatus(200)
            ->assertSee($word);
    }
}
