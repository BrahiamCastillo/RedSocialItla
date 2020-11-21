<?php 

require_once 'databaseConnection.php';
require_once '../Objects/Usuario.php';

class DataBaseMethods {
    private $connection;

    function __construct($directory)
    {
        $this->connection = new databaseConnection($directory);
    }

    public function getTableUsuario() {

        $tableList = array();

        $stm = $this->connection->db->prepare('Select * FROM usuario');
        $stm->execute();

        $result = $stm->get_result();

        if($result->num_rows === 0) {

            return $tableList;

        } else {
            while($row = $result->fetch_object()) {
                $user = new Usuario();

                $user->id = $row->id;
                $user->nombre = $row->nombre;
                $user->apellido = $row->apellido;
                $user->telefono = $row->telefono;
                $user->correo = $row->correo;
                $user->usuario = $row->usuario;
                $user->clave = $row->clave;

                array_push($tableList, $user);
            }

            return $tableList;
        }
    }
}

?>