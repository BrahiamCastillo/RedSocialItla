<?php 

class PublicacionEdit {
    public $id_publicacion;
    public $publicacion;
    public $fecha_hora;
    public $id_usuario;

    public function InizializeData(
        $id_publicacion,
        $publicacion
        ) {

            $this->id_publicacion = $id_publicacion;
            $this->publicacion= $publicacion; 

        }
}
