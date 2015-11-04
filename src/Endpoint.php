<?php

namespace Sesame;

interface Endpoint
{
    /**
     * @return string
     */
    public function authenticate(array $credentials);
}
