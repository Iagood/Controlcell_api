<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;

class FileController extends Controller
{
    public function validateImage(object $request)
    {
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            return true;
        }
        return false;
    }

    public function renameImage(object $request)
    {
        $name = Str::slug($request->name, '_');
        $extension = $request->image->extension();
        
        $nameFile = "{$name}.{$extension}";
        return $nameFile;
    }

    protected function storeImage(object $request, string $nameFile)
    {
        $upload = $request->image->storeAs('products', $nameFile);
        if(!$upload) {
            return response()->json(['error' => 'Fail upload'], 500);
        }
    }
}