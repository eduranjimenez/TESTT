<?php

namespace App\Repositories\Eloquent;

use App\Institution;
use App\Repositories\Contracts\UserInterface;
use App\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\WelcomeUser;

class UserRepo implements UserInterface
{
    public function index()
    {
        $users = User::orderby('name')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $institutions = Institution::orderby('name')->get();
        return view('users.create', compact('institutions'));
    }

    public function edit($user)
    {
        $institutions = Institution::orderby('name')->get();
        return view('users.edit', compact('user', 'institutions'));
    }

    public function update($request, $user)
    {   
        $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'institution_id' => 'required',
            'email' => 'required|unique:users,email, '.$user->id,
            'phone' => 'required'
        ]);

        $user->update($request->all());
        flash('Usuario ' . $user->name . ' actualizado exitosamente.')->success();
        return redirect(route('users.index'));
    }

    public function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt(str_random(10)),
            'institution_id' => $request->institution_id,
            'phone' => $request->phone,
        ]);

        $token = app('auth.password.broker')->createToken($user);
        $user->notify(new WelcomeUser($token));

        flash('Usuario ' . $user->name . ' creado exitosamente.')->success();
        return redirect(route('users.index'));
    }

    public function delete($user)
    {
        $user->delete();
        flash('Usuario ' . $user->name . ' eliminado exitosamente.')->success();
        return redirect(route('users.index'));
    }
}
