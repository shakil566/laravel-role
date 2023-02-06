<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index(){

        $roleArr = Role::orderBy('title', 'asc')->pluck('title', 'id')->toArray();
        $targetArr = UserRole::with(['user','role'])->get();
        // echo '<pre>';
        // print(Helper::stringToArrayToName('1,2', $roleArr));
        // exit;

        return view('frontend.index')->with(compact('targetArr','roleArr'));
    }
}
