<?php

namespace Sesame\Endpoint;

use Sesame\Authenticator;
use Sesame\Endpoint;

class JsonEndpoint implements Endpoint
{
    private $authenticator;

    public function __construct(Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    public function authenticate(array $credentials)
    {
        return json_encode([
            "authenticated" => $this->authenticator->authenticate($credentials),
        ]);
    }
}
