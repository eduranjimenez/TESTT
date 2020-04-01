<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantPost;
use App\Repositories\Contracts\ParticipantInterface;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Commission;
use App\InstitutionCommission;
use Auth;
class ParticipantController extends Controller
{
    protected $repo;

    public function __construct(ParticipantInterface $repo)
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
    public function store(ParticipantPost $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        return $this->repo->edit($participant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipantPost $request, Participant $participant)
    {
        return $this->repo->update($request, $participant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $Participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        return $this->repo->delete($participant);
    }

    public function getRepresentations($commission)
    {
        return $this->repo->getRepresentations($commission);
    }

    public function validateParticipant(Request $request, Participant $participant)
    {
        return $this->repo->validateParticipant($request, $participant);
    }
}
