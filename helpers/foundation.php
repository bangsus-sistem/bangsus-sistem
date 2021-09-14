<?php

use Bsb\Foundation\Http\Authentication;

/**
 * @param  string  $type
 * @param  array  $refs
 * @return bool
 */
function bsbf_auth($type, $refs)
{
    return Authentication::authenticate($type, $refs);
}
