<?php 

class Publicacion {
    public $id_publicacion;
    public $publicacion;
    public $fecha_hora;
    public $id_usuario;

    public function InizializeData(
        $id_usuario,
        $publicacion
        ) {

            $this->id_usuario = $id_usuario;
            $this->publicacion= $publicacion; 

        }
}
