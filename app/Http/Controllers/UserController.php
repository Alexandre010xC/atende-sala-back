<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;

class UserController extends Controller
{
    public function allUsers(Request $request){
        $users = User::all();

        return response()->json($users);
    }

    public function storeOrFind(Request $request){
        $data['name'] = $request->name;

        if($request->token == 'null'){
            $token = Str::random(32);

            $data['token'] = $token;
            $data['password'] = bcrypt($token);

            $user = User::create($data);

            return response()->json($user);
        }

        $user = User::where('token','=',$request->token)->first();
        $user->update($data);

        return response()->json($user);
    }
}
