<?php

namespace Tests\Unit;

use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{

  public function tearDown()
  {
    
    Mockery::close();

  }

  public function testIndex()
  {

    $messageRepo = Mockery::mock('App\Repositories\CacheMessages');

    $controller = new MessageController($messageRepo);

    $messageRepo->shouldReceive('getPaginated')->once();

    $controller->index();


  }
}
