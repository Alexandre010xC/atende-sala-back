<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function allUsers(Request $request)
    {
        $users = User::all();

        return response()->json($users);
    }

    public function user(Request $request)
    {
        $user = User::where('token_id','=',$request->token_id)->first();
        $data['name'] = $request->name;
        $user->update($data);

        return response()->json($user, 200);
    }

    public function LoginOrRegister(Request $request)
    {
        $token_id = $request->token_id;

        if($token_id == 'null'){
            $token_id = Str::random(32);

            $data['name'] = $request->name;
            $data['token_id'] = $token_id;
            $data['password'] = bcrypt($token_id);

            User::create($data);

        } else if($request->name){
            $data['name'] = $request->name;
            $user = User::where('token_id','=',$token_id)->first();

            $user->update($data);

        }

        Auth::attempt(['token_id' => $token_id, 'password' => $token_id]);
        $user = Auth::user();
            $auth_token = $user->createToken($token_id);

        return response()->json($auth_token, 200);
    }
}
