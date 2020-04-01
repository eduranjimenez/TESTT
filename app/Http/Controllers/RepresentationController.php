<?php

namespace App\Http\Controllers;

use App\Representation;
use Illuminate\Http\Request;
use App\Repositories\Contracts\RepresentationInterface;
use App\Http\Requests\RepresentationPost;
class RepresentationController extends Controller
{
    protected $repo;
    public function __construct(RepresentationInterface $repo)
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
        return view('representations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentationPost $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Representation  $Representation
     * @return \Illuminate\Http\Response
     */
    public function show(Representation $representation)
    {
        return view('representations.show', compact('representation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Representation  $Representation
     * @return \Illuminate\Http\Response
     */
    public function edit(Representation $representation)
    {
        return view('representations.edit', compact('representation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Representation  $Representation
     * @return \Illuminate\Http\Response
     */
    public function update(RepresentationPost $request, Representation $representation)
    {
        return $this->repo->update($request, $representation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Representation  $Representation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representation $representation)
    {
        return $this->repo->delete($representation);
    }

    public function importRepresentations(Request $request)
    {
        return $this->repo->importRepresentations($request);
    }
}
