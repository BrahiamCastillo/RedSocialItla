<?php 

class Comentarios {
    private $id_comentario;
    private $id_publicacion;
    private $id_usuario;
    private $comentario;
    private $fecha_hora;

    function InizializeData(
        $id_comentario, 
        $id_publicacion, 
        $id_usuario,
        $comentario,
        $fecha_hora
        ) {

            $this->id_comentario = $id_comentario;  
            $this->id_publicacion = $id_publicacion;  
            $this->id_usuario = $id_usuario; 
            $this->comentario = $comentario;
            $this->fecha_hora = $fecha_hora;

        }
}

?>