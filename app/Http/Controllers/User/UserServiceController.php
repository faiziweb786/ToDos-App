<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class UserServiceController extends Controller
{
    public function services() {
        $services = Service::all();
        return view('user.services' ,compact('services'));
    }
}
