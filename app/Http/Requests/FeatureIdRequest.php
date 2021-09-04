<?php

namespace App\Http\Requests;

use Bsb\Foundation\Http\AuthIdRequest;

class FeatureIdRequest extends AuthIdRequest
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

    /**
     * @return string
     */
    protected function model()
    {
        return '';
    }
}
