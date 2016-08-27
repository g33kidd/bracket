<?php

use \App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;

class ControllerTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        $this->controller = new Controller();
    }

    public function testRecordNotFoundMethodExists()
    {
        $this->assertTrue(method_exists($this->controller, 'recordNotFound'));
    }

    public function testRecordNotFoundReturnsA404JsonResponseObject()
    {
        $resp = $this->controller->recordNotFound();

        $this->assertTrue($resp instanceof JsonResponse);
        $this->assertEquals($resp->status(), 404);
    }

    public function testRecordNotFoundReturnsAMessageKeyInJsonResponse()
    {
        $resp = $this->controller->recordNotFound();
        $respCont = json_decode($resp->content());

        $this->assertTrue($respCont->message !== null);
        $this->assertEquals($respCont->message, 'Record not found');
    }

}
