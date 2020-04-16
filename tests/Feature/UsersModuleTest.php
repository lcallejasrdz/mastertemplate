<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;
    
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

    /**
     * @test
     */
    function itTestsTheUserDeleteMethod()
    {
        $route = 'users';

        $user = factory(User::class)->create([
            'slug' => Str::slug('Eduardo Callejas'),
            'username' => 'lcallejasrdz',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => 'Eduardo',
            'last_name' => 'Callejas',
            'email' => 'lcallejasrdz@gmail.com',
            'role_id' => 1,
        ]);

        $this->call('DELETE', '/'.$route.'/delete', ['id' => $user->id, '_token' => csrf_token()]);

        $this->assertCount(0, User::all());
    }
    
    /**
     * @test
     */
    function itLoadsTheDeletedUsersListPage()
    {
        $route = 'users';
        $title = trans('module_'.$route.'.controller.deleted_word');

        $this->get('/'.$route.'/deleted')
            ->assertStatus(200)
            ->assertSee($title);
    }

    /**
     * @test
     */
    function itTestsTheUserRestoreMethod()
    {
        $route = 'users';

        $user = factory(User::class)->create([
            'slug' => Str::slug('Eduardo Callejas'),
            'username' => 'lcallejasrdz',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'first_name' => 'Eduardo',
            'last_name' => 'Callejas',
            'email' => 'lcallejasrdz@gmail.com',
            'role_id' => 1,
        ]);

        $this->call('DELETE', '/'.$route.'/delete', ['id' => $user->id, '_token' => csrf_token()]);

        $this->assertCount(0, User::all());

        $this->call('POST', '/'.$route.'/restore', ['id' => $user->id, '_token' => csrf_token()]);

        $this->assertCount(1, User::all());
    }
}
