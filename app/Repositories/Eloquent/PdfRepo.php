<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PdfInterface;
use App\Participant;
use PDF;
class PdfRepo implements PdfInterface
{
    public function participantsByInstitution($institution)
    {
        $participants = Participant::where('institution_id', $institution->id)->where('is_completed', 1)->get();
        $pdf = PDF::loadView('pdf.all', ['participants' => $participants]);
        $papersize = [0,0,153,242];
        $pdf->setPaper($papersize);
        return $pdf->stream();
    }

    public function byParticipant($participant)
    {
        if($participant->is_completed == 0 || $participant->is_completed == false) {
            flash('Este participante no ha completado sus documentos.')->error();
            return redirect()->back();
        } 
        $pdf = PDF::loadView('pdf.nametag', ['participant' => $participant]);
        $papersize = [0,0,153,242];
        $pdf->setPaper($papersize);
        return $pdf->stream();
    }
}
