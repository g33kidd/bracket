<?php

use App\Models\Team;
use App\Http\Controllers\Api\TeamsController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamsControllerTest extends TestCase
{
    use DatabaseMigrations;

    const FACTORY_TEAMS_TO_CREATE = 5;

    public function setUp()
    {
        parent::setUp();

        $this->teams = factory(
            Team::class, self::FACTORY_TEAMS_TO_CREATE)->create();
    }

    public function testTeamsControllerExtendsController()
    {
        $this->assertTrue(is_subclass_of(TeamsController::class, Controller::class));
    }

    public function testTeamsIndexReturnsAListOfTeams()
    {
        $this->get('/api/teams');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id', 'name', 'slug', 'description'
            ]
        ]);
    }

    public function testTeamsShowReturnsASingleTeam()
    {
        $this->get('/api/teams/1');

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id', 'name', 'slug', 'description'
        ]);
    }

    public function testTeamsShowReturns404IfResourceDoesntExist()
    {
        $this->get('/api/teams/999999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testTeamsDestroyRemovesTeamWithId()
    {
        $team = Team::find('1');

        // Assert that the team exists before our destroy api call
        $this->assertTrue($team instanceof Team);

        // Call delete on the existing Team
        $this->delete('/api/teams/1');

        $team = Team::find('1');

        $this->assertResponseOk();
        $this->assertEquals($team, null);
    }

    public function testTeamsDestroyReturns404IfRecordDoesntExist()
    {
        $this->delete('/api/teams/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testTeamsStoreRequiresNameAndSlug()
    {
        $this->actingAs($this->user)->post('/api/teams', [
            'name' => ''
        ]);

        $this->assertSessionHasErrors(['name', 'description']);
    }

    public function testTeamsStoreAddsNewTeam()
    {
        $this->actingAs($this->user)->post('/api/teams', [
            'name' => 'Bracket Dev Team',
            'description' => 'Team Description'
        ]);

        $this->assertResponseOk();
        $this->seeJsonStructure(['id']);

        $nextId = self::FACTORY_TEAMS_TO_CREATE + 1;
        $team = Team::find($nextId);

        $this->assertTrue($team instanceof Team);
    }

    public function testTeamsUpdateReturns404IfResourceDoesntExist()
    {
        $this->actingAs($this->user)->put('/api/teams/999999', [
            'name' => 'Bracket Dev Team',
            'description' => 'Team Description'
        ]);

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testTeamsUpdateAllowsUpdatesToAllFields()
    {
        $newName = 'Rocket League Team';
        $newDescription = 'This is my rocket league team\'s description.';

        $this->actingAs($this->user)->put('/api/teams/1', [
            'name' => $newName,
            'description' => $newDescription
        ]);

        $team = Team::find(1);

        $this->assertTrue($team->name === $newName);
        $this->assertTrue($team->description === $newDescription);
    }

    public function testTeamsUpdateMethodValidatesInput()
    {
        $this->actingAs($this->user)->put('/api/teams/1', [
            'name' => ''
        ]);

        $this->assertSessionHasErrors(['name', 'description']);
    }
}