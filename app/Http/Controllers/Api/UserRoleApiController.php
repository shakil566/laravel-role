<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserRoleApiController extends Controller
{
    public function index(Request $request)
    {

        $targetArr = User::all();

        return response($targetArr);
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
        $qpArr = $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:role,title',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->messages()
            ], 400);
        } else {

            $target = new Role;
            $target->role = $request->role;
            $target->user_id = Auth::id();

            // return $target;

            $target->save();
            return response()->json([
                'status' => 200,
                'message' => 'Role  Created Successfully'
            ], 200);
        }
    }

    public function show($id)
    {

        $data = User::orderBy('id', 'desc');
        if ($data) {
            return response($data);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User id ' . $id . ' not found'
            ], 404);
        }
    }

    public function edit(Request $request, $id)
    {

    }


    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {
        $target = UserRole::find($id);

        if ($target) {
            $target->delete();
            return response()->json([
                'message' => 'User Role deleted'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'User ' . $id . ' not found'
            ], 404);
        }
    }
}
