<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class AdminController extends Controller
{
    public function index() {
        $items = Item::all();
        $randomNumber = random_int(500, 5000);
        $randNumber = random_int(50, 100);
        return view('admin.index' , compact('items' , 'randomNumber' , 'randNumber'));
    }
    public function dashboard() {
        $items = Item::all();
        $randomNumber = random_int(500, 5000);
        $randNumber = random_int(50, 100);
        return view('admin.pages.dashboard' , compact('items' , 'randomNumber' , 'randNumber'));
    }
    public function widgets() {
        return view('admin.pages.widgets');
    }
    public function charts() {
        return view('admin.pages.charts');
    }
    public function forms() {
        return view('admin.pages.forms');
    }
    public function users() {
        return view('admin.pages.user-management.users');
    }
    public function permission() {
        return view('admin.pages.user-management.permission');
    }

}

