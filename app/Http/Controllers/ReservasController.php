<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservasController extends Controller {
    public function create() {
        return view('reservas.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        Reserva::crear($data);
        return redirect('/reservas');
    }

    public function index() {
        $reservas = Reserva::all();
        return view('reservas.index', ['reservas' => $reservas]);
    }
}
