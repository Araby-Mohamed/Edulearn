<?php
namespace App\Http\Controllers;
use File;

trait UploadFileTrait{

    public static function storeFile($file, $path, $type)
    {
        if($file != null) {
            // Rename File
            $newFile = date('ymdgis') . mt_rand(100, 1000000) . '.' . $file->getClientOriginalExtension();

            // Move File
            if ($type === 'file') {
                $file->move('media/files/' . $path, $newFile);
                return $newFile;

            } elseif ($type === 'image') {
                $file->move('media/images/' . $path, $newFile);
                return $newFile;
            }
        }

        return null;
    }


    public static function updateFile($file, $path, $type, $oldFile)
    {
        if($file != null) {

            // Rename File
            $newFile = date('ymdgis') . mt_rand(100, 1000000) . '.' . $file->getClientOriginalExtension();

            // Move File
            if ($type === 'file') {
                if ($file->move('media/files/' . $path, $newFile)) {
                    // Delete old file
                    File::Delete('media/files/' . $path . '/' . $oldFile);
                    return $newFile;
                }

            } elseif ($type === 'image') {
                if ($file->move('media/images/' . $path, $newFile)) {
                    // Delete old file
                    File::Delete('media/images/' . $path . '/' . $oldFile);
                    return $newFile;
                }
            }
        }

        return $oldFile;
    }
}