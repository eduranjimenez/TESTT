<?php

namespace App\Repositories\Contracts;

interface RepresentationInterface
{
    public function index();
    public function store($request);
    public function update($request, $representation);
    public function delete($representation);
    public function importRepresentations($request);
}