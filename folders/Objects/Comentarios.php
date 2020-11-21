<?php 

class Comentarios {
    private $id_comentario;
    private $id_publicacion;
    private $comentario;
    private $fecha_hora;

    function InizializeData(
        $id_comentario, 
        $id_publicacion, 
        $comentario,
        $fecha_hora
        ) {

            $this->id_comentario = $id_comentario;  
            $this->id_ublicacion = $id_publicacion;  
            $this->comentario = $comentario;
            $this->fecha_hora = $fecha_hora;

        }
}

?>