<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function __invoke() {
        return view("register");
    }
    public function login() {
        return view("login");
    }
    public function store() {
        $attributes = request()->validate([
            "name" => "required",
            "username" => ["required", Rule::unique("users", "username"), "min:3", "max:10"],
            "email" => ["required", "email"],
            "password" => ["required", "min:4", "max:15"]
        ]);
        $user = User::create($attributes);
        auth()->login($user);
        return redirect()->to("/");
    }
    public function destroy() {
        auth()->logout();
        return redirect()->back();
    }
    public function create() {
        $credentials = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
        if(!auth()->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->back();
        }
        return redirect("/");
    }
}
