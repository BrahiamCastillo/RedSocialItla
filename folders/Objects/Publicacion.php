<?php 

class Publicacion {
    private $id_publicacion;
    private $publicacion;
    private $fecha_hora;
    private $id_usuario;

    function InizializeData(
        $id_publicacion, 
        $publicacion, 
        $fecha_hora,
        $id_usuario
        ) {

            $this->id_publicacion = $id_publicacion; 
            $this->publicacio= $publicacion; 
            $this->fecha_hora = $fecha_hora;
            $this->id_usuario = $id_usuario;

        }
}

?>