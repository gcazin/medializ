<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class UserController extends Controller
{

    /**
     * Page du profil
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();
        return view('auth.profile',compact('user', $user));
    }

    /**
     * Page des options
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings()
    {
        $user = Auth::user();
        return view('auth.settings', compact('user', $user));
    }

    /**
     * Modifier les informations du profil
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, User $user)
    {
        /*$avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
        $user->avatar = $avatarName;
        $request->avatar->storeAs('avatars', $avatarName);*/

        $request->validate([
            'name' => 'sometimes|string|max:25|unique:users',
            'email' => 'sometimes|string|email|max:255|unique:users,id',
            'password' => 'sometimes|string|min:8|confirmed',
        ]);
        $data = $request->password ? $request->all() : $request->except('password');
        $user->update($data);

        return view('auth.profile', compact('user', $user));
    }

}
