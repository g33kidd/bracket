<?php

use \App\Models\Platform;
use \App\Http\Controllers\Api\PlatformsController;
use \App\Http\Controllers\Controller;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PlatformsControllerTest extends TestCase
{
    use DatabaseMigrations;

    const FACTORY_PLATFORMS_TO_CREATE = 5;

    public function setUp()
    {
        parent::setUp();

        $this->games = factory(
            Platform::class, PlatformsControllerTest::FACTORY_PLATFORMS_TO_CREATE)->create();
    }

    public function testPlatformsControllerExtendsController()
    {
        $this->assertTrue(is_subclass_of(PlatformsController::class, Controller::class));
    }

    public function testPlatformsIndexReturnsAListOfPlatforms()
    {
        $this->get('/api/platforms');

        $this->assertResponseOk();
		$this->seeJsonStructure([
            '*' => [
                'name', 'short_name', 'logo', 'banner'
            ]
        ]);
	}

    public function testPlatformsShowReturnsASinglePlatform()
    {
        $this->get('/api/platforms/1');

        $this->assertResponseOk();
		$this->seeJsonStructure([
            'name', 'short_name', 'logo', 'banner'
		]);
	}

    public function testPlatformsShowReturns404IfRecordDoesntExist()
    {
        $this->get('/api/platforms/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPlatformsDestroyRemovesPlatformWithId()
    {
        $platform = Platform::find('1');

        // Assert that game exists before api call
        $this->assertTrue($platform instanceof Platform);

        // Call delete on the existing Platform
        $this->delete('/api/platforms/1');

        $platform = Platform::find('1');

        $this->assertResponseOk();
        $this->assertEquals($platform, null);
    }

    public function testPlatformsDestroyReturns404IfRecordDoesntExist()
    {
        $this->delete('/api/platforms/99999');

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPlatformsStoreRequiresNameFields()
    {
        $this->actingAs($this->user)->post('/api/platforms', [
            'name' => ''
        ]);

        $this->assertSessionHasErrors(['name', 'short_name']);
    }

    public function testPlatformsStoreAddsNewPlatform()
    {
        $this->actingAs($this->user)->post('/api/platforms', [
            'name' => 'Steam',
            'short_name' => 'ST'
        ]);

        $this->assertResponseOk();
        $this->seeJsonStructure(['id']);

        $nextId = PlatformsControllerTest::FACTORY_PLATFORMS_TO_CREATE + 1;
        $platform = Platform::find($nextId);

        $this->assertTrue($platform instanceof Platform);
    }

    public function testPlatformsUpdateReturns404IfResourceDoesntExist()
    {
        $this->actingAs($this->user)->put('/api/platforms/99999', [
            'name' => 'Rocket League',
            'short_name' => 'RL'
        ]);

        $this->assertResponseStatus(404);
        $this->seeJson([
            'message' => 'Record not found'
        ]);
    }

    public function testPlatformsUpdateReturnsValidationErrorIfRequiredFieldsArentSupplied()
    {
        $this->actingAs($this->user)->put('/api/platforms/1', [
            'logo' => ''
        ]);

        $this->assertSessionHasErrors(['name', 'short_name']);
    }

    public function testPlatformsUpdateAllowsUpdatesToAllFields()
    {
        $newName = 'This is an entirely new name.';
        $newShortName = 'this is the new short name.';
        $newLogoPath = '/some/path/to/a/logo.jpg';
        $newBannerPath = '/some/path/to/a/banner.png';

        $this->actingAs($this->user)->put('/api/platforms/1', [
            'name' => $newName,
            'short_name' => $newShortName,
            'logo' => $newLogoPath,
            'banner' => $newBannerPath
        ]);

        $platform = Platform::find(1);

        $this->assertTrue($platform->name === $newName);
        $this->assertTrue($platform->short_name === $newShortName);
        $this->assertTrue($platform->logo === $newLogoPath);
        $this->assertTrue($platform->banner == $newBannerPath);
    }

}
