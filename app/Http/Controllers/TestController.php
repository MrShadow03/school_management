<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\FileUpload;


class TestController extends Controller
{
    use FileUpload;

    public function create(){
        return view('dashboard.pages.test');
    }

    public function store(Request $request)
    {
        $msg = $this->fileUpload($request, 'image', 'test3_img');

    }
}