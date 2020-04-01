<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Participant;
use App\Repositories\Contracts\PdfInterface;
use App\Institution;
class PdfController extends Controller
{
    protected $repo;

    public function __construct(PdfInterface $repo)
    {
        $this->repo = $repo;
    }

    public function pdf()
    {
        $participant = Participant::first();
        $pdf = PDF::loadView('pdf.nametag', ['participant' => $participant]);
        $papersize = [0,0,252,144];
        $pdf->setPaper($papersize, 'landscape');
        return $pdf->stream();
    }

    public function participantsByInstitution(Institution $institution)
    {
        return $this->repo->participantsByInstitution($institution);
    }

    public function byParticipant(Participant $participant)
    {
        return $this->repo->byParticipant($participant);
    }
}
