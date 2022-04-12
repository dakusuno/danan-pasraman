<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function upload_process(Request $request)
    {
        $this->validate($request,[
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
        echo 'File Size: '.$file->getSize();
        echo '<br>';
        echo 'File Mime Type: '.$file->getMimeType();
        $tujuan_upload = 'data_file';
        $file->move ($tujuan_upload,$file->getClientOriginalName());
    }
}
