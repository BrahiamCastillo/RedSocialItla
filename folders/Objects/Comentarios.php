<?php 

class Comentarios {
    public $id_comentario;
    public $id_publicacion;
    public $id_usuario;
    public $comentario;
    public $fecha_hora;

    public function InizializeData(
        $id_publicacion, 
        $id_usuario,
        $comentario
        ) {

            $this->id_publicacion = $id_publicacion;  
            $this->id_usuario = $id_usuario; 
            $this->comentario = $comentario;

        }
}

?>