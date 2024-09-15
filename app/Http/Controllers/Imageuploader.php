<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Imageuploader extends Controller
{
    public function imgUpload($image, $imgName, $savePath)
    {

        date_default_timezone_set('Asia/Colombo');
        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $filename = $imgName . '_' . $currentDateTime . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public/' . $savePath, $filename);
        return $path;
    }


}
