<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
    public function webUpload()
    {
        return view('webUpload');
    }

    public function success()
    {

    }
}
