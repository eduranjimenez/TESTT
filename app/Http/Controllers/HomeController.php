<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Institution;
use App\User;
use App\Representation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadistics = [];
        $stadistics['users'] = User::count();
        $stadistics['representations'] = Representation::count();
        $stadistics['institutions'] = Institution::count();
        $stadistics['participants'] = Participant::count();
        $stadistics['validated_participants'] = Participant::where('is_completed', true)->count();
        $stadistics['ada'] = Participant::where('category', 'Asesor Docente Adicional (ADA)')->count();
        $stadistics['ador'] = Participant::where('category', 'Asesor Docente Responsable de Grupo (ADOR)')->count();
        $stadistics['deb'] = Participant::where('category', 'Delegado de Educación Básica')->count();
        $stadistics['dbm'] = Participant::where('category', 'Delegado de Educación Media')->count();
        $stadistics['dbs'] = Participant::where('category', 'Delegado de Educación Superior')->count();
        $stadistics['guess'] = Participant::where('category', 'Invitado Especial')->count();
        $stadistics['observer'] = Participant::where('category', 'Observador')->count();
        $stadistics['secretary'] = Participant::where('category', 'Secretaría')->count();
        return view('home', compact('stadistics'));
    }
}
