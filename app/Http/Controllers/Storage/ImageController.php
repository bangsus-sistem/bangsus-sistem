<?php

namespace App\Http\Controllers\Storage;

use Bsb\Foundation\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Storage\Image;

class ImageController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function show(Request $request, $id)
    {
        $image = Image::find($id);

        $picture = Storage::disk('image')->get(
            is_null($image) ? 'not-found.png' : $image->storage_dir
        );
        $mime = Storage::disk('image')->mimeType(
            is_null($image) ? 'not-found.png' : $image->storage_dir
        );
        return response(
            Storage::disk('image')->get(
                is_null($image) ? 'not-found.png' : $image->storage_dir
            ),
        )->header('Content-Type', $mime);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storageDir = Storage::disk('image')
            ->putFile('', $request->file('image'));

        $image = new Image;
        $image->name = $request->file('image')->getClientOriginalName();
        $image->storage_dir = $storageDir;
        $image->save();

        return response()->json($image);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBase64(Request $request)
    {
        $name = uniqid().uniqid().uniqid().uniqid().'.jpeg';
        Storage::disk('image')
            ->put($name, base64_decode(explode(',', explode(';', $request->input('image'))[1])[1]));

        $image = new Image;
        $image->name = $name;
        $image->storage_dir = $name;
        $image->save();

        return response()->json($image);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::disk('image')->delete($image->storage_dir);
        $image->delete();

        return response()->noContent();
    }
}
