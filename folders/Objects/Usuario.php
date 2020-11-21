<?php 

class Usuario {
    private $id_usuario;
    private $nombre;
    private $telefono;
    private $correo;
    private $usuario;
    private $clave;

    function InizializeData(
        $id_usuario, 
        $nombre, 
        $apellido,
        $telefono,
        $correo,
        $usuario,
        $clave
        ) {

            $this->id_usuario = $id_usuario; 
            $this->nombre = $nombre; 
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->clave = $clave ;

        }
}

?>