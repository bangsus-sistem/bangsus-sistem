<?php

namespace App\Http\Controllers\Storage;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Storage\File;

class FileController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function show(Request $request, $id)
    {
        $file = File::findOrFail($id);
        return Storage::disk('file')->download($file->storage_dir, $file->name);
    }
}
