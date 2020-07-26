<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testReturnPath()
    {
        $user = factory('App\User')->make();

        $this->assertEquals('/users/'. $user->id, $user->path());
    }
}
