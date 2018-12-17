<?php
/**
 * Created by PhpStorm.
 * User: isqo
 * Date: 12/17/2018
 * Time: 10:44 PM
 */

namespace Tests\Unit;


use App\Http\Middleware\SetupMiddleWare;
use App\Setup;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class SetupMiddleWareTest extends TestCase
{

    /**
     * @test
     */
    public function it_redirect_to_setup_if_not_already_installed()
    {
        $mock = Mockery::mock(Setup::class);
        $mock
            ->shouldReceive('alreadyInstalled')
            ->andReturn(false);

        // Create request
        $request = Request::create('http://localhost/main', 'GET');

        // Pass it to the middleware
        $middleware = new SetupMiddleWare($mock);
        $response = $middleware->handle($request, function () {
        });

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('http://localhost/setup', $response->headers->get('location'));
    }

    /**
     * @test
     */
    public function it_continue_to_setup_if_not_already_installed_and_path_is_setup()
    {
        $mock = Mockery::mock(Setup::class);
        $mock
            ->shouldReceive('alreadyInstalled')
            ->andReturn(false);

        // Create request
        $request = Request::create('http://localhost/setup', 'GET');

        // Pass it to the middleware
        $middleware = new SetupMiddleWare($mock);
        $response = $middleware->handle($request, function ($request) {
            return response('http://localhost/setup', 200);
        });

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('http://localhost/setup', $response->getContent());
    }

    /**
     * @test
     */
    public function it_continues_if_already_installed()
    {
        $mock = Mockery::mock(Setup::class);
        $mock
            ->shouldReceive('alreadyInstalled')
            ->andReturn(true);

        // Create request
        $request = Request::create('http://localhost/main', 'GET');

        // Pass it to the middleware
        $middleware = new SetupMiddleWare($mock);
        $response = $middleware->handle($request, function ($request) {
            return response('http://localhost/main', 200);
        });

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($response->getContent(), 'http://localhost/main');

    }

    /**
     * @test
     */
    public function it_redirect_to_main_if_setup_path_and_already_installed()
    {
        $mock = Mockery::mock(Setup::class);
        $mock
            ->shouldReceive('alreadyInstalled')
            ->andReturn(true);

        // Create request
        $request = Request::create('http://localhost/setup', 'GET');

        // Pass it to the middleware
        $middleware = new SetupMiddleWare($mock);
        $response = $middleware->handle($request, function () {
        });

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('http://localhost', $response->headers->get('location'));
    }
}