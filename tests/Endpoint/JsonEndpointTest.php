<?php

namespace Sesame\Test\Endpoint;

use Mockery;
use Sesame\Authenticator;
use Sesame\Endpoint\JsonEndpoint;
use Sesame\Test\Test;

class JsonEndpointTest extends Test
{
    public function testAuthenticate()
    {
        $authenticator = Mockery::mock(Authenticator::class);

        $goodCredentials = [
            "username" => "chris",
            "password" => "YwrNnBiLDrTbB3c4ifRY",
        ];

        $badCredentials = [
            "username" => "kayla",
            "password" => "YwrNnBiLDrTbB3c4ifRY",
        ];

        $authenticator
            ->shouldReceive("authenticate")
            ->with($goodCredentials)
            ->andReturn(true);

        $authenticator
            ->shouldReceive("authenticate")
            ->with($badCredentials)
            ->andReturn(false);

        $endpoint = new JsonEndpoint($authenticator);

        $this->assertEquals(
            '{"authenticated":true}',
            $endpoint->authenticate([
                "username" => "chris",
                "password" => "YwrNnBiLDrTbB3c4ifRY",
            ])
        );

        $this->assertEquals(
            '{"authenticated":false}',
            $endpoint->authenticate([
                "username" => "kayla",
                "password" => "YwrNnBiLDrTbB3c4ifRY",
            ])
        );
    }
}
