<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class UserController extends Controller
{

    /**
     * Page des options
     *
     * @return Factory|View
     */
    public function options()
    {
        $user = Auth::user();
        return view('auth.options', compact('user', $user));
    }

    /**
     * Page du profil
     *
     * @return Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('auth.edit',compact('user', $user));
    }

    /**
     * Modifier les informations du profil
     *
     * @param UserRequest $request
     * @param User $user
     * @return Factory|View
     */
    public function update(UserRequest $request, User $user)
    {
        /*$avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
        $user->avatar = $avatarName;
        $request->avatar->storeAs('avatars', $avatarName);*/

        if(!$request->has('password')) {
            $request->validate([
                'name' => ['required', 'string', 'max:25', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }

        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password')) {
            $user->password = $request->password;
        }

        $user->save();

        return redirect()->route('products.index')
            ->with('success','Product updated successfully');
    }

    public function destroy($id)
    {

    }

}
