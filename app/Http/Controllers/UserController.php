<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function reg(Request $request) {

        $request->validate([
            'last_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Zа-яА-ЯёЁ\s-]+$/u'],
            'first_name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Zа-яА-ЯёЁ\s-]+$/u'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'last_name.regex' => 'Фамилия должна содержать только буквы кириллицы или латиницы.',
            'first_name.regex' => 'Имя должно содержать только буквы кириллицы или латиницы.',
            'login.regex' => 'Логин должен содержать только латинские буквы, цифры и символ подчеркивания.',
        ]);

        $user = new User();
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->password = md5($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->birthday = $request->birthday;

        $user->save();
        return redirect()->route('welcome');
    }

    public function auth(Request $request) {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ],
        [
            'required'=>'Поле обязательно для заполнения'
        ]);

        $user = User::query()
            ->where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('welcome');
        } else
            return redirect()->back()->with('error', 'Такого пользователя не существует');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('authorization');
    }

    public function profile() {
        $user = Auth::user();
        $tours = Tour::all();
        return view('profile', ['user' => $user, 'tours' => $tours]);
    }

    public function update(Request $request) {
        $user = Auth::user();

        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;

        $user->update();
        return redirect()->back();

    }
}
