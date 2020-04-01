<?php

namespace App\Repositories\Eloquent;

use App\Category;
use App\CommissionRepresentation;
use App\Enums\Lang;
use App\Enums\Roles;
use App\Institution;
use App\InstitutionCommission;
use App\Participant;
use App\ParticipantRepresentation;
use App\Repositories\Contracts\ParticipantInterface;
use Auth;

class ParticipantRepo implements ParticipantInterface
{
    public function index()
    {
        $participants;
        if (Auth::user()->role === Roles::ISADMIN) {
            $stadistics['participants'] = Participant::count();
            $stadistics['validated_participants'] = Participant::where('is_completed', true)->count();
            $participants = Participant::orderby('name')->get();
        } else {
            $stadistics['participants'] = Participant::where('institution_id', Auth::user()->institution_id)->count();
            $stadistics['validated_participants'] = Participant::where('is_completed', true)->where('institution_id', Auth::user()->institution_id)->count();
            $participants = Participant::where('institution_id', Auth::user()->institution_id)->get();
        }
        return view('participants.index', compact('participants', 'stadistics'));
    }

    public function create()
    {
        $institutions;
        if (Auth::user()->role === Roles::ISADMIN) {
            $institutions = Institution::orderby('name')->get();
        } else {
            $institutions = Institution::where('id', Auth::user()->institution_id)->get();
        }
        $categories = Category::orderby('name')->get();
        $institutionsCommissions = InstitutionCommission::with('commission')->where('institution_id', Auth::user()->institution_id)->get();
        return view('participants.create', compact('institutionsCommissions', 'institutions', 'categories'));
    }

    public function store($request)
    {
        $participant = Participant::create($request->all());

        if ($request->has('photo')) {
            $participant->addMedia($request->photo)
                ->toMediaCollection('photos');
        }

        if ($request->has('conduct_code')) {
            $participant->addMedia($request->conduct_code)
                ->toMediaCollection('conduct_codes');
        }

        if ($request->has('first_payment')) {
            $participant->addMedia($request->first_payment)
                ->toMediaCollection('first_payments');
        }

        if ($request->has('last_payment')) {
            $participant->addMedia($request->last_payment)
                ->toMediaCollection('last_payments');
        }

        if ($request->has('commissionrepresentation_id') && $request->commissionrepresentation_id != '') {
            $representation = CommissionRepresentation::where('id', $request->commissionrepresentation_id)->first();

            $selectedRepresentations = ParticipantRepresentation::where('commissionrepresentation_id', $request->commissionrepresentation_id)->count();

            if ($selectedRepresentations < $representation->capacity) {
                ParticipantRepresentation::create([
                    'participant_id' => $participant->id,
                    'commissionrepresentation_id' => $request->commissionrepresentation_id,
                ]);
            } else {
                flash('El cupo de la representación seleccionada ya esta lleno.')->error()->important();
            }

        }

        flash('Participante ' . $participant->name . ' creado exitosamente.')->success();
        return redirect()->back();
    }

    public function edit($participant)
    {
        $institutions;
        if (Auth::user()->role === Roles::ISADMIN) {
            $institutions = Institution::orderby('name')->get();
        } else {
            $institutions = Institution::where('id', Auth::user()->institution_id)->get();
        }
        $categories = Category::orderby('name')->get();
        $institutionsCommissions = InstitutionCommission::with('commission')->where('institution_id', Auth::user()->institution_id)->get();
        return view('participants.edit', compact('participant', 'commissions', 'institutions', 'categories','institutionsCommissions'));
    }

    public function update($request, $participant)
    {
        $participant->update($request->all());

        if ($request->has('photo')) {
            $participant->clearMediaCollection('photos');
            $participant->addMedia($request->photo)
                ->toMediaCollection('photos');
        }

        if ($request->has('conduct_code')) {
            $participant->clearMediaCollection('conduct_codes');
            $participant->addMedia($request->conduct_code)
                ->toMediaCollection('conduct_codes');
        }

        if ($request->has('first_payment')) {
            $participant->clearMediaCollection('first_payments');
            $participant->addMedia($request->first_payment)
                ->toMediaCollection('first_payments');
        }

        if ($request->has('last_payment')) {
            $participant->clearMediaCollection('last_payments');
            $participant->addMedia($request->last_payment)
                ->toMediaCollection('last_payments');
        }
        
        if ($request->has('commissionrepresentation_id') && $request->commissionrepresentation_id != '') {
            $participant_represetation = ParticipantRepresentation::where('participant_id', $participant->id)->delete();
            $representation = CommissionRepresentation::where('id', $request->commissionrepresentation_id)->first();

            $selectedRepresentations = ParticipantRepresentation::where('commissionrepresentation_id', $request->commissionrepresentation_id)->count();

            if ($selectedRepresentations < $representation->capacity) {
                ParticipantRepresentation::create([
                    'participant_id' => $participant->id,
                    'commissionrepresentation_id' => $request->commissionrepresentation_id,
                ]);
            } else {
                flash('El cupo de la representación seleccionada ya esta lleno.')->error()->important();
            }

        }

        flash('Participante ' . $participant->name . ' actualizado exitosamente.')->success();
        return redirect()->back();
    }

    public function delete($participant)
    {
        $participant->delete();
        flash('Participante ' . $participant->name . ' eliminado exitosamente.')->success();
        return redirect(route('participants.index'));
    }

    public function getRepresentations($commission)
    {
        $institutionCommission = InstitutionCommission::where('id', $commission)->first();

        if ($institutionCommission->commission->language_id === Lang::SPANISH) {
            return CommissionRepresentation::with('representation:id,spanish_name AS name')->where('institutioncommission_id', $commission)->get();
        }

        if ($institutionCommission->commission->language_id === Lang::ENGLISH) {
            return CommissionRepresentation::with('representation:id,english_name AS name')->where('institutioncommission_id', $commission)->get();
        }

        if ($institutionCommission->commission->language_id === Lang::FRENCH) {
            return CommissionRepresentation::with('representation:id,french_name AS name')->where('institutioncommission_id', $commission)->get();
        }
    }

    public function validateParticipant($request, $participant)
    {
        if($request->is_completed === "1") {
            $participant->update(['is_completed' => true]);
        } else {
            $participant->update(['is_completed' => false]);
        }

        flash('Participante ' . $participant->name . ' actualizado exitosamente.')->success();
        return redirect()->back();

    }

}
