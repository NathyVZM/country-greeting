<?php
// Greeting.php

class Saludo {
    private $mensaje;
    private $horaLocal;

    public function __construct($mensaje, $horaLocal) {
        $this->mensaje = $mensaje;
        $this->horaLocal = $horaLocal;
    }

    public function obtenerMensaje() {
        return $this->mensaje;
    }

    public function obtenerHoraLocal() {
        return $this->horaLocal->format('h:i A');
    }
}
?>
