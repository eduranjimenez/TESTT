<?php

namespace App\Repositories\Contracts;

interface PdfInterface
{
    public function participantsByInstitution($institution);
    public function byParticipant($participant);
}