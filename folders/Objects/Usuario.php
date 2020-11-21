<?php 

class Usuario {
    private $id;
    private $nombre;
    private $telefono;
    private $correo;
    private $usuario;
    private $clave;

    function InizializeData(
        $id, 
        $nombre, 
        $apellido,
        $telefono,
        $correo,
        $usuario,
        $clave
        ) {

            $this->id = $id; 
            $this->nombre = $nombre; 
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->clave = $clave ;

        }
}

?>