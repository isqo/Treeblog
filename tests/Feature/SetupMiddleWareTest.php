<?php
/**
 * Created by PhpStorm.
 * User: isqo
 * Date: 12/17/2018
 * Time: 10:44 PM
 */

namespace Tests\Feature;


use App\Setup;
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

        $this->app->instance(Setup::class, $mock);

        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertHeader('location', 'http://localhost/setup');
    }
}