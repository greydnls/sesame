<?php

namespace Sesame;

interface Authenticator
{
    public function authenticate(array $credentials);
}
