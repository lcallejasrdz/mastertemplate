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
        $word = trans('module_'.$route.'.controller.word');

        $this->get('/'.$route)
            ->assertStatus(200)
            ->assertSee($word);
    }

    /**
     * @test
     */
    // function itLoadsTheUserDetailPage()
    // {
    //     $route = 'users';
    //     $word = trans('module_'.$route.'.controller.word');

    //     $this->get('/'.$route.'/'.$user)
    //         ->assertStatus(200)
    //         ->assertSee($word);
    // }
}
