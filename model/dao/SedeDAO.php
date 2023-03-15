<?php
// dao data access object
require_once 'config/Conexion.php';

class SedeDAO
{
    private $con;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function selectAll()
    {

        $sql = "select * from sede ";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //retornar resultados
        return $resultados;
    }

    public function selectbyprovincia($provincia)
    { // buscar un producto por su id
        $sql = "SELECT * FROM `sede` WHERE `provincia` LIKE :provincia";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['provincia' => "%".$provincia."%"];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); // fetch retorna el primer registro
        // retornar resultados
        return $resultados;
    }


    public function selectOne($id)
    { // buscar un producto por su id
        $sql = "select * from sede where id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $sede = $stmt->fetch(PDO::FETCH_ASSOC); // fetch retorna el primer registro
        // retornar resultados
        return $sede;
    }

    public function insert($sede)
    {
        try {
            //sentencia sql
            $sql = "insert into sede(provincia,ciudad, horario, activo, direccion, fecha_act) values(:provincia, :ciudad, :horario, :activo, :direccion, :fecha)";
            //bind parameters
            $sentencia = $this->con->prepare($sql);
           
        $data = [
            'provincia' => $sede->getProvincia(),
            'ciudad' => $sede->getCiudad(),
            'horario' => $sede->getHorario(),
            'activo' => $sede->getActivo(),
            'direccion' => $sede->getDireccion(),
            'fecha' => $sede->getFecha(),

        ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function update($sede)
    {

        try {
            //prepare
            $sql = "UPDATE  sede SET provincia =:provincia, ciudad = :ciudad, horario = :horario, activo = :activo, direccion = :direccion, fecha_act=:fecha WHERE sede.id = :id";
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' => $sede->getId(),
                'provincia' => $sede->getProvincia(),
                'ciudad' => $sede->getCiudad(),
                'horario' => $sede->getHorario(),
                'activo' => $sede->getActivo(),
                'direccion' => $sede->getDireccion(),
                'fecha' => $sede->getFecha(),
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
        return true;
    }

    public function eliminar($id)
    {
        try {
            //prepare
            $sql = "DELETE FROM sede WHERE id = :id";
            //now());
            //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'id' =>  $id
            ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) { // verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return true;
    }
}
