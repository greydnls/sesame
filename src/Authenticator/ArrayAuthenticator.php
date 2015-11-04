<?php

namespace Sesame\Authenticator;

use InvalidArgumentException;
use Sesame\Authenticator;

class ArrayAuthenticator implements Authenticator
{
    private $users;

    public function __construct(array $users)
    {
        foreach ($users as $user) {
            if (!is_array($user)) {
                throw new InvalidArgumentException();
            }
        }

        $this->users = $users;
    }

    public function authenticate(array $credentials)
    {
        $filtered = array_filter($this->users, function($user) use ($credentials) {
            return $user["username"] === $credentials["username"] && $user["password"] === $credentials["password"];
        });

        return count($filtered) === 1;
    }
}
