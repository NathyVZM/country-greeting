<?php
// Country.php

class Pais {
    private $nombre;
    private $zonaHoraria;

    public function __construct($nombre, $zonaHoraria) {
        $this->nombre = $nombre;
        $this->zonaHoraria = $zonaHoraria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getZonaHoraria() {
        return $this->zonaHoraria;
    }
}
?>
