<?php 

class Amigos {
    public $id_amigo;
    public $id_usuario;

    function InizializeData(
        $id_amigo, 
        $id_usuario 
        ) {

            $this->id_amigo = $id_amigo;
            $this->id_usuario = $id_usuario;

        }
}

?>