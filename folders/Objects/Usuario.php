<?php 

class Usuario {
    public $id_usuario;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $usuario;
    public $clave;

    public function InizializeData(
        $nombre, 
        $apellido,
        $telefono,
        $correo,
        $usuario,
        $clave
        ) {

            $this->nombre = $nombre; 
            $this->apellido = $apellido;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->clave = $clave;

        }
}

?>