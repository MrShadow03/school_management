<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.account');
    }
    
    public function create()
    {
        return view('dashboard.pages.admin.account_create');
    }
}
