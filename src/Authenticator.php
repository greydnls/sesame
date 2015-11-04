<?php

namespace Sesame;

interface Authenticator
{
    /**
     * @return bool
     */
    public function authenticate(array $credentials);
}
