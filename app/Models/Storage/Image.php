<?php

namespace App\Models\Storage;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Models\Concerns\{
    HasUserTimestamps,
    HasUserDelete,
};

class Image extends Model
{
    use SoftDeletes, HasUserTimestamps, HasUserDelete;
}
