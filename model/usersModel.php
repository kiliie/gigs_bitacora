<?php
require_once "ConDB.php";
class ModelUsers{

    static public function createUser($data){
       
        $query= "INSERT INTO usuario (usu_id,usu_usuario, usu_contra, usu_mail, rol_id,usu_dateUpdate,usu_identifier,usu_key) VALUES (NULL,:usu_usuario, :usu_contra,:usu_mail, :rol_id, :dateUpdate,:identifier,:usu_key);";
        $statement  = Connection::conecction()->prepare($query);
        $statement-> bindParam(":usu_usuario", $data["user"],PDO::PARAM_STR);
        $statement-> bindParam(":usu_contra", $data["pss"],PDO::PARAM_STR);
        $statement-> bindParam(":usu_mail", $data["mail"],PDO::PARAM_STR);
        $statement-> bindParam(":rol_id", $data["rol"],PDO::PARAM_STR);
        $statement-> bindParam(":dateUpdate", $data["dateUpdate"],PDO::PARAM_STR);
        $statement-> bindParam(":identifier", $data["identifier"],PDO::PARAM_STR);
        $statement-> bindParam(":usu_key", $data["key"],PDO::PARAM_STR);       
        $mesage = $statement-> execute() ? "ok" : Connection::conecction()->errorInfo();
        $statement-> closeCursor();
        $statement= null;
        $query = "";
        return $mesage; 

    }

    static public function getUsers($param){
        $param =  is_numeric($param) ? $param : 0;
        $query ="SELECT usuario.usu_id, usuario.usu_usuario, usuario.usu_mail, usuario.rol_id, usu_dateUpdate,
        rol.rol_id, rol.rol_descripcion
        FROM usuario
        INNER JOIN rol ON usuario.rol_id = rol.rol_id";
         $query .= ($param > 0) ? " WHERE usuario.usu_id ='$param' " : "";
         // echo $query;
          $statement  = Connection::conecction()->prepare($query);
           $statement->execute();
           $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
           return $result;
    }

    static public function getUsersAuth(){        
        $query="";
        $query= "SELECT usu_identifier, usu_key FROM usuario" ;
        $statement  = Connection::conecction()->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);         
        return $result;
    }

}
?>