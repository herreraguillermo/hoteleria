<?php

namespace App\Controllers;

use App\Models\Reserva;

class ReservasController {
    public function create() {
        include __DIR__ . '/../Views/reservas/create.php';
    }

    public function store() {
        $reserva = new Reserva();
        $reserva->usuario_id = $_POST['usuario_id'];
        $reserva->habitacion_id = $_POST['habitacion_id'];
        $reserva->fecha_inicio = $_POST['fecha_inicio'];
        $reserva->fecha_fin = $_POST['fecha_fin'];
        $reserva->ocupantes = $_POST['ocupantes'];
        $reserva->save();

        header('Location: /reservas');
    }

    public function index() {
        $reservas = Reserva::all();
        include __DIR__ . '/../Views/reservas/index.php';
    }
}
