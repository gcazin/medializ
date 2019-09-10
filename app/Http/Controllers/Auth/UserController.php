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

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function advanced()
    {
        $user = Auth::user();
        return view('auth.advanced', compact('user', $user));
    }

    /**
     * Modifier les informations du profil
     *
     * @param UserRequest $request
     * @param User $user
     * @return Factory|View
     */
    public function update(Request $request)
    {
        /*$avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
        $user->avatar = $avatarName;
        $request->avatar->storeAs('avatars', $avatarName);*/

        $user = User::find(auth()->user()->id);
        if(is_null($request->avatar)) {
            $user->avatar = auth()->user()->avatar;
        } else {
            $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
            $user->avatar = $avatarName;
            $request->avatar->storeAs('avatars', $avatarName);
        }
        if(is_null($request->password)) {
            $request->validate([
                'name' => ['string', 'max:25', 'unique:users,name,'. auth()->user()->id],
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        } elseif(!is_null($request->password)) {
            $request->validate([
                'name' => ['string', 'max:25', 'unique:users,name,'. auth()->user()->id],
                'email' => ['string', 'email', 'max:255', 'unique:users,email,' . auth()->user()->id],
                'password' => ['string', 'min:8', 'confirmed'],
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('edit')
            ->with('success','Votre compte à bien été mis à jour');
    }

    public function destroy($id)
    {

    }

}
