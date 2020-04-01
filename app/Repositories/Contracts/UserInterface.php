<?php

namespace App\Repositories\Contracts;

interface UserInterface
{
    public function index();
    public function create();
    public function update($request, $user);
    public function edit($user);
    public function store($request);
    public function delete($user);
}