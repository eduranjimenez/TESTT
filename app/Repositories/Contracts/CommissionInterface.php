<?php

namespace App\Repositories\Contracts;

interface CommissionInterface
{
    public function index();
    public function store($request);
    public function update($request, $commission);
    public function delete($commission);
    public function importCommissions($request);
}