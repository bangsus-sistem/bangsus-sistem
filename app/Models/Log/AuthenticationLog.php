<?php

namespace App\Models\Log;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUser,
    HasUserDelete,
};

class AuthenticationLog extends Model
{
    use SoftDeletes, HasUser, HasUserDelete;
}
