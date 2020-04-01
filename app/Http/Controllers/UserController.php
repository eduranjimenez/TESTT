<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserInterface;
use App\Http\Requests\UserPost;
use App\User;

class UserController extends Controller
{
    protected $repo;
    
    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    public function create()
    {
        return $this->repo->create();
    }

    public function update(Request $request, User $user)
    {
        return $this->repo->update($request, $user);
    }

    public function edit(User $user)
    {
        return $this->repo->edit($user);
    }
    
    public function store(UserPost $request)
    {
        return $this->repo->store($request);
    }

    public function destroy(User $user)
    {
        return $this->repo->delete($user);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
