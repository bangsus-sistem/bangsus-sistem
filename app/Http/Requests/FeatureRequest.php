<?php

namespace App\Http\Requests;

use Bsb\Foundation\Http\AuthRequest;

class FeatureRequest extends AuthRequest
{
    use LogActivityRequest;

    /**
     * @var string
     */
    protected $type = 'feature';

    /**
     * @var array
     */
    protected $refs = [];
}
