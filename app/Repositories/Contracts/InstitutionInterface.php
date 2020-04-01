<?php

namespace App\Repositories\Contracts;

interface InstitutionInterface
{
    public function index();
    public function store($request);
    public function create();
    public function show($institution);
    public function update($request, $institution);
    public function delete($institution);
    public function edit($institution);
    public function getCommissions($institutionId);
    public function assignStore($request);
    public function getCommissionRepresentations($institutioncommission);
    public function importInstitutions($request);
    public function participantsExcel($institution);
    public function commissionsReport($commission);
    public function generalReport();
}
