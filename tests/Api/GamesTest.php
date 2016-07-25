<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GamesTest extends TestCase
{
    
	public function testAllGames()
	{
		$this->get('/games')->seeJsonStructure([
			'*' => [
				''
			]
		]);
	}

	public function testSingleGame()
	{
		$this->get('/games/1')->seeJsonStructure([
			'*' => [
				''
			]
		]);
	}

}
