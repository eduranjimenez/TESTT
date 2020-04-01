<?php

namespace App\Repositories\Contracts;

interface ParticipantInterface
{
    public function index();
    public function store($request);
    public function create();
    public function update($request, $participant);
    public function delete($participant);
    public function edit($participant);
    public function getRepresentations($commission);
    public function validateParticipant($request, $participant);
}