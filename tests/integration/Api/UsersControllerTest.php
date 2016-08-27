<?php

use \App\Models\User;
use \App\Http\Controllers\Api\UsersController;
use \App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersControllerTest extends TestCase
{
    use DatabaseMigrations;

    const FACTORY_USERS_TO_CREATE = 4;

    public function setUp()
    {
        parent::setUp();

        $this->users = factory(
            User::class, UsersControllerTest::FACTORY_USERS_TO_CREATE)->create();
    }

    public function testUsersControllerExtendsController()
    {
        $this->assertTrue(is_subclass_of(UsersController::class, Controller::class));
    }

    public function testUsersIndexReturnsAListOfUsers()
    {
        $this->get('/api/users');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id', 'username', 'created_at', 'updated_at'
            ]
        ]);
    }

    public function testUsersShowReturnsASingleUser()
    {
        $this->get('/api/users/1');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id', 'username', 'created_at', 'updated_at'
        ]);
    }

    public function testUsersShowReturns404IfResourceDoesntExist()
    {
        $this->get('/api/users/99999');

        // TODO: Replace all checks for the json and error for resource
        // doesn't exist errors to just spy on the method... Once I figure out
        // how Laravel wants to handle that.
        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testUsersDestroyRemovesUserWithId()
    {
        $user = User::find('1');

        // Assert that user exists before api call
        $this->assertTrue($user instanceof User);

        // Call delete on the existing User
        $this->delete('/api/users/1');

        $user = User::find('1');

        $this->assertResponseOk();
        $this->assertEquals($user, null);
    }

    public function testUsersDestroyReturns404IfRecordDoesntExist()
    {
        $this->delete('/api/users/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

}