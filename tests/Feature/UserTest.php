<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
   use WithFaker;


   //Can an admin create a user
    public function testCanCreateAUser()
    {
        $this->withoutExceptionHandling();

        $this->be(User::where('role_id', 1)->first());

        $user = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',       'remember_token' => 'fWfdSefSA',
            'role_id' => 1
        ];

        $this->post('/users', $user);

        $this->assertDatabaseHas('users', $user);

        $this->get('/users')->assertSee($user['name']);
    }

    public function testAdminCanCreateUser()
    {
        //find first user that is not an admin
        $this->be(User::where('role_id', '!=', 1)->first());
        //post create a new user
        $this->post('/users', factory('App\User')->raw())->assertStatus(403);
    }


    public function testUserRequiresRole()
    {
        $this->be(User::find(1));
        $user = factory('App\User')->raw(['role_id' => '']);

        $this->post('/users', $user)->assertSessionHasErrors('role_id');

    }

    //Can see individual user page
    public function testUserView()
    {
        $this->withoutExceptionHandling();
        $user = factory('App\User')->create();
        $this->actingAs($user);

        $this->get($user->path())
            ->assertSee($user->name)
            ->assertSee($user->role_id);

    }

    public function testUserMustBeAuthenticatedToSeeView()
    {
        //set the user
        $user = User::find(1);
        //assert to see redirection
        $this->get($user->path())->assertRedirect('login');

    }

    public function testOnlyUserCanSeeTheirPage()
    {
        //get the first user
        $user = User::find(1);
        //be the user
        $this->be($user);
        //create a new user
        $newUser = factory(User::class)->create();
        //assert a 403 when trying to access newUser's page
        $this->get($newUser->path())->assertStatus(403);

    }

    public function testAdminsCanAccessCreateView()
    {

        //be a user that is an admin
        $this->be(User::where('role_id',1)->first());
        //get the create view assert status 200
        $this->get('/users/create')->assertStatus(200);
    }

    public function testNonAdminsCannotAccessCreateView()
    {

        //be a user that is not an admin
        $this->be(User::where('role_id','!=', 1)->first());
        //get the create view assert status 403
        $this->get('/users/create')->assertStatus(403);
    }




}
