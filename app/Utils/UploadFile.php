<?php
namespace App\Utils;


class UploadFile
{
    
    /**
     * uploadFile
     *
     * @param  mixed $folder folder name to save file
     * @param  mixed $file file data(get from  $request->file())
     *
     * @return string file's path just saved
     */
    public static function uploadFile($folder, $file)
    {
        $fileExt = $file->getClientOriginalExtension();
        $newFilename = uniqid('file', true) . '.' . $fileExt;

        $newFileUrl = $file->move($folder, $newFilename);

        return $newFileUrl;
    }
}
