<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Smtp;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    //All Smtp
    public function AllSmtp()
    {
        $smtps = Smtp::all();
        return view('admin.pages.smtp.all_smtp', compact('smtps'));
    }
}
