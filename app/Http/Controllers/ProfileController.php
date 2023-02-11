<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
    public function show($username) {
        // dd($username);
        $user = User::with([
            "questions" => function ($query) {
                return $query->limit(10);
        }, "comments", "badges", "profile"])->where("username", $username)->first();
        // dd($user->id);
        return view("profile", [
            "user" => $user
        ]);
    }
    public function edit($username) {
        if(!(auth()->user()->username == $username)) {
            abort(404);
        }
        $profile = User::with(["profile"])
            ->firstWhere("username", $username);
        return view("editProfile", compact("profile"));
    }
    public function update(Request $request, $username) {
        $user = User::with(["profile"])
            ->firstWhere("username", $username);
        $validator = Validator::make($request->all(),
        [
            "description" => "required",
            "email" => "required|email|unique:users,email",
            "name" => "required",
        ]);
        if(($user['email'] != request()->get("email")) && $validator->fails()) {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $user['email'] = request()->get("email");
        $user['name'] = request()->get("name");
        $user->save();
        $user->profile()->update([
            "description" => request()->get("description")
        ]);
        return 1;
    }
}
