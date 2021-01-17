<?php

namespace App\Http\Controllers;
use App\Admin;
use App\PuppyPage;
use Illuminate\Http\Request;


class AdminController extends PageController
{
    public function getLogForm(Request $request) {
        session_start();
        $_SESSION['login'] = $request['login'];
        $_SESSION['password'] = $request['password'];
        return redirect("admin/page");
    }

    public function log() {
        return view('admin_form');
    }



}
