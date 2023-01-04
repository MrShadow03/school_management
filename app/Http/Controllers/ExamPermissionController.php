<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamPermissionController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.exam_permissions');
    }
}
