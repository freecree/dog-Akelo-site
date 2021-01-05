<?php

namespace App\Http\Controllers;

use App\PuppyPage;
use App\Page;
use App\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getHome() {
        setcookie("hash", 'false', time() - 1);
        session_start();
        session_unset();
        return view("index");
    }
    public function getPuppyPage($code) {
        $p = PuppyPage::where('code', "$code")->firstOrFail();
        $p->explodeImages();
        return view("$p->fileName", ['obj'=>$p]);
    }

    public function getSomePage($code) {
       if ($code == 'admin') {
            if (!Admin::isAdmin()) {
                return view('admin_form');
            } else {
                return redirect(route('admin.pages'));
            }
        }
        $page = Page::where('code', "$code")->firstOrFail();
        $all_puppies = DB::table('puppy_pages')->get();
        return view("$code", ['puppies'=>$all_puppies, 'page'=>$page]);
    }
};
