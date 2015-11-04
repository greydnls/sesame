<?php

namespace Sesame\Test\Authenticator;

use Sesame\Authenticator\ArrayAuthenticator;
use Sesame\Test\Test;

class ArrayAuthenticatorTest extends Test
{
    public function testAuthenticate()
    {
        $users = [
            [
                "username" => "chris",
                "password" => "YwrNnBiLDrTbB3c4ifRY",
            ],
            [
                "username" => "kayla",
                "password" => "QZDdbYEj9hxahBC3aimY",
            ],
        ];

        $authenticator = new ArrayAuthenticator($users);

        $this->assertTrue(
            $authenticator->authenticate([
                "username" => "chris",
                "password" => "YwrNnBiLDrTbB3c4ifRY",
            ])
        );

        $this->assertFalse(
            $authenticator->authenticate([
                "username" => "kayla",
                "password" => "YwrNnBiLDrTbB3c4ifRY",
            ])
        );
    }
}
