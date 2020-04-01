<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;
use App\Repositories\Contracts\InstitutionInterface;
use App\Http\Requests\InstitutionPost;
use App\Participant;
use App\Commission;
use App\Http\Requests\InstitutionCommission;
class InstitutionController extends Controller
{
    protected $repo;

    public function __construct(InstitutionInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repo->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->repo->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionPost $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        return $this->repo->show($institution);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(Institution $institution)
    {
        return $this->repo->edit($institution);
    }

    /**
    * Show the form for assign a commission.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
        return $this->repo->assign();
    }

    public function assignStore(InstitutionCommission $request)
    {
        return $this->repo->assignStore($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionPost $request, Institution $institution)
    {
        return $this->repo->update($request, $institution);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        return $this->repo->delete($institution);
    }

    public function getCommissionRepresentations($institutioncommission)
    {
        return $this->repo->getCommissionRepresentations($institutioncommission);
    }

    public function importInstitutions(Request $request)
    {
        return $this->repo->importInstitutions($request);
    }
    
    public function participantsExcel(Institution $institution)
    {
        return $this->repo->participantsExcel($institution);
    }

    public function participantByCommission($commission)
    {
        return $this->repo->commissionsReport($commission);
    }

    public function reports()
    {
        $institutions = Institution::orderby('name')->get();
        return view('reports.institutions', compact('institutions'));
    }

    public function commissionsReport()
    {
        $commissions = Commission::orderby('name')->get();
        return view('reports.commissions', compact('commissions'));
    }

    public function generalReport()
    {
        return $this->repo->generalReport();
    }
}
