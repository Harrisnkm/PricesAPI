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

    public function testUserRequiresRole()
    {
        $user = factory('App\User')->raw(['role_id' => '']);
        $this->post('/users', $user)->assertSessionHasErrors('role_id');

    }

    //Can see individual user page
    public function testUserView()
    {
        $this->withoutExceptionHandling();
        $user = factory('App\User')->create();

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


}
