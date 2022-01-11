<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

define("FAMILY", 1);
define("FRIENDS", 2);
define("IDEAS", 3);
define("ME", 4);
define("MEMES", 5);
define("PC", 6);

class GalleryController extends Controller
{
    public function galleryView()
    {
        return view('gallery.photo_viewer');
    }

    public function getFileList()
    {
        $manuals = [];
        $filesInFolder = File::files('manual');

        foreach ($filesInFolder as $path) {
            $manuals[] = pathinfo($path);
        }
        return $manuals;
    }

    public function deleteFile(Request $request)
    {
        $query = $request->image;
        if ($query and file_exists(public_path() . $query)) {
            unlink(public_path() . $query);
        }
    }

    public function moveFile(Request $request)
    {
        if ($request->newFileName && $request->newFileName != '' && $request->newFileName != null && $request->newFileName != $request->fileName) {
            $newFileName = $request->newFileName;
        } else {
            $newFileName = $request->fileName;
            $newFileName = explode('/manual', $request->fileName);
            $newFileName = implode($newFileName);
            $newFileName = explode('/', $newFileName);
            $newFileName = implode($newFileName);
        }
        $currentFileName = public_path() . $request->fileName;
        $destinationPath = $request->newPath;
        $moveFile = public_path('manual') . $destinationPath . '/' . $newFileName;
        File::move($currentFileName, $moveFile);
        return $moveFile;
    }
}
