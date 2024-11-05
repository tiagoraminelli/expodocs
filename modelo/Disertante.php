<?php
require_once 'Bd.php';
require_once 'Persona.php'; // Importamos la clase Persona para poder extenderla
Class Disertante extends Persona {
protected $table = "disertante"; //creamos la tabla
protected $conection; //protegemos el atributo de conexion;
protected $cantidad; //protegemos la cantidad de disertantes

private $Biografia;
private $Url;
private $Twitter;
private $Linkedin;



function getConection(){ //creamos la conexion con la base de datos;
    $db= new Db; //crea un nuevo objeto basededatos
    $this->conection=$db->conection; //le asigna el valor a conexion a la basededatos
}


//GETS

public function getBiografia(){
    return $this->Biografia;
}
public function getUrl(){
    return $this->Url;
}
public function getTwitter(){
    return $this->Twitter;
}
public function getLinkedin(){
    return $this->Linkedin;
}

// SETS

public function setBiografia(){
    return $this->Biografia;
}

public function setUrl(){
    return $this->Url;
}

public function setTwitter(){
    return $this->Twitter;
}
public function setLinkedin(){
    return $this->Linkedin;
}


//funcion de conectar a la base de datos con los datos

//INVOCAMOS TODA LA TABLA

//constructor 

public function __construct($Biografia = "",$Url = "", $Twitter = "",$Linkedin = ""){ //$Nombre,$Apellidos
    $this->Biografia = $Biografia;
    $this->Url = $Url;
    $this->Twitter = $Twitter;
    $this->Linkedin = $Linkedin;
    return $this;
}


//DEVUELVE EL LIST DE TODOS LOS DISERTANTES 

public function getDisertantes(){
    $this->getConection(); // ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    
    // consulta SQL con JOIN entre disertante y persona
    $sql = " SELECT * FROM `disertante`,persona WHERE disertante.persona_id = persona.id"; 
    $stmt = $this->conection->prepare($sql); // preparamos la consulta
    $stmt->execute(); // ejecutamos la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorno de todos los resultados de la consulta
}


public function getDisertantesByEventos(){
    $this->getConection(); // ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    // consulta SQL con JOIN entre disertante y persona
    $sql = "SELECT DISTINCT p.nombre,p.apellidos,disertante.* FROM `disertante`,evento,persona as p WHERE disertante.id = evento.disertante_id and disertante.persona_id = p.id"; 
    $stmt = $this->conection->prepare($sql); // preparamos la consulta
    $stmt->execute(); // ejecutamos la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorno de todos los resultados de la consulta
}


//ARMAMOS LA FUNCION DE INVOCAR LOS DATOS POR ID

public function getDisertantesById($id){
    $this->getConection(); // ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    
    // consulta SQL con JOIN entre disertante y persona
    $sql = "
        SELECT 
            p.id,
            p.nombre,
            p.apellidos,
            p.telefono,
            p.email,
            d.biografia,
            d.url,
            d.twitter,
            d.linkedin
        FROM 
            persona p
        JOIN 
            disertante d ON p.id = d.id
        WHERE (d.id = ? AND p.id = ?)
    "; 

    $stmt = $this->conection->prepare($sql); // preparamos la consulta
    $stmt->execute([$id,$id]); // ejecutamos la consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // retorno de todos los resultados de la consulta
}



//funcion para sacar la cantidad;

public function getCantidad(){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT count(*) as cantidad FROM ".$this->table; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute();//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetch(PDO::FETCH_ASSOC); //te manda solo 1 linea 

}

public function deleteDisertanteById($id){ //empieza la funtion
    $this->getConection(); //ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    $sql="DELETE FROM ".$this->table." WHERE `id` = ? "; //armamos la cadena sql 
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    return $stmt->execute([$id]); //ejecutamos la consulta
}


}//fin de clase






?>