<?php

namespace App\Http\Requests;

use Bsb\Foundation\Http\AuthRequest;

class WidgetRequest extends AuthRequest
{
    use LogActivityRequest;

    /**
     * @var string
     */
    protected $type = 'widget';

    /**
     * @var array
     */
    protected $refs = [];
}
