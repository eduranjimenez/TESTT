<?php

namespace App\Http\Controllers;

use App\Commission;
use Illuminate\Http\Request;
use App\Http\Requests\CommissionPost;
use App\Repositories\Contracts\CommissionInterface;
use App\Language;

class CommissionController extends Controller
{
    protected $repo;

    public function __construct(CommissionInterface $repo)
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
        $languages = Language::all();
        return view('commissions.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommissionPost $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        return view('commissions.show', compact('commission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        $languages = Language::all();
        return view('commissions.edit', compact('commission', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function update(CommissionPost $request, Commission $commission)
    {
        return $this->repo->update($request, $commission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commission  $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        return $this->repo->delete($commission);
    }

    public function importCommissions(Request $request)
    {
        return $this->repo->importCommissions($request);
    }
}
