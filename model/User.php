<?php


class User
{
    protected $db;
    private $nombre;
    private $apellido;
    private $email;
    private $cedula;
    private $id;

    public function __construct(PDO $connection)
    {
        $this->db = $connection;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }
    function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    function getId()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getEmail()
    {
        return $this->email;
    }
    function getCedula()
    {
        return $this->cedula;
    }

    function addDatos()
    {
        $consultaDocu = $this->db->prepare("SELECT COUNT(*) FROM users WHERE cedula = :cedula");
        $consultaDocu->bindValue(":cedula", $this->cedula);
        $consultaDocu->execute();
        $cantidad = $consultaDocu->fetchColumn();

        if ($cantidad > 0) {
            return false;
        } else {
            $stm = $this->db->prepare("INSERT INTO users (firs_name, last_name, email, cedula) VALUES (:nom, :ape, :email, :cedula)");
            $stm->bindValue(':nom', $this->nombre);
            $stm->bindValue(':ape', $this->apellido);
            $stm->bindValue(':email', $this->email);
            $stm->bindValue(':cedula', $this->cedula);
            $stm->execute();
            return true;
        }
    }

    public function consulta (){
        $stm = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stm->bindValue(':id',$this->id);
        $stm->execute();
        return $stm->fetchAll();
    }
    function getAll()
    {
        $stm = $this->db->prepare("SELECT * FROM users");
        $stm->execute();
        return $stm->fetchAll();

    }
    function deleteUsuario($id)
    {
        $consulta = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $consulta->bindValue(":id", $id);
        $consulta->execute();
    }
    function actualizarUsuario()
    {
            $stm=$this->db->prepare('UPDATE users SET firs_name = :nom , last_name = :apellido, email= :email, cedula = :cedula WHERE id = :id ');
            $stm->bindValue(':nom', $this->nombre);
            $stm->bindValue(':apellido', $this->apellido);
            $stm->bindValue(':email', $this->email);
            $stm->bindValue(':cedula', $this->cedula);
            $stm->bindValue(':id',$this->id);  
            $stm->execute();
            header('Location:../vistas/guardar.php');
   }
    // function addCedula()
    // {
    //     $stm = $this->db->prepare("UPDATE users
    //      SET cedula = :cedula
    //      WHERE firs_name = :nom AND last_name = :ape AND email = :email;");
    //     $marcadores = [
    //         ":nom" => $this->nombre,
    //         ":ape" => $this->apellido,
    //         ":email" => $this->email,
    //         ":cedula" => $this->cedula
    //     ];
    //     $stm->execute($marcadores);
    // }
    // function mostrar(){



    // }

}