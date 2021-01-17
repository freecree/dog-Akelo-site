<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class Admin extends Model
{
    use HasFactory;
    public static function isAdmin() {
        $login = DB::table('admins')->where('code','admin')->pluck('login')->first();
        $password = DB::table('admins')->where('code','admin')->pluck('password')->first();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login'] ) && isset($_SESSION['password'])) {
            if($login === $_SESSION['login'] && $password === $_SESSION['password']) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

//    public static function render() {
//        if (self::isAdmin()) {
//            return redirect(route('admin.pages'));
//        } else {
//            return redirect(route('admin.log'));
//        }
//     }
}
