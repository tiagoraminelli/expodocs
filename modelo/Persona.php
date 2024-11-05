<?php
set_include_path("../lib");
require_once 'Bd.php';
//require_once 'GeneradorDatos.php';
class Persona {
    protected $table = "persona";       // Nombre de la tabla en la base de datos
    protected $conection;  // Conexión a la base de datos
    protected $cantidad;    // Cantidad de disertantes (parece un contador)
    private $Id;
    private $Nombre;
    private $Apellidos;
    private $Email;
    private $Telefono;

    function getConection(){ //creamos la conexion con la base de datos;
        $db= new Db; //crea un nuevo objeto basededatos
        $this->conection=$db->conection; //le asigna el valor a conexion a la basededatos
    }
    
    // Constructor
    public function __construct($Id = "", $Nombre ="", $Apellidos="", $Email="", $Telefono=""){
        $this->Id = $Id;
        $this->Nombre = $Nombre;
        $this->Apellidos = $Apellidos;
        $this->Email = $Email;
        $this->Telefono = $Telefono;
    }

    // Métodos getters y setters (ejemplo de uno para cada atributo)
    public function getId() {
        return $this->Id;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function getApellidos(){
        return $this->Apellidos;
    }

    public function getTelefono(){
        return $this->Telefono;
    }

    public function getEmail(){
        return $this->Email;
    }


    //setters
    public function setId($Id) {
        $this->Id = $Id;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }
    
    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }
    
    public function setTelefono($Telefono) {
        $this->Telefono = $Telefono;
    }
    
    public function setEmail($Email) {
        $this->Email = $Email;
    }
    


    public function getPersona(){ //creamos la conexion a la tabla
        $this->getConection(); //ejecuta un metodo de la clase que gestiona la conexion a la base de datos
        $sql="SELECT * FROM ".$this->table; //armamos la cadena sql 
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute(); //ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //retorno de todos los resultados de la consulta
    
    }

    public function getPersonaById($Id){
        $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
        $sql="SELECT * FROM ".$this->table." WHERE id = ?"; //consulta sql generica, ese signo ? es un valor
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute([$Id]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
        return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
    }

    
    public function getPersonaInDisertante($Id) {
        $this->getConection(); // Establece la conexión a la base de datos
        // Consulta SQL mejorada
        $sql = "SELECT * 
                FROM persona
                INNER JOIN disertante ON persona.id = disertante.id
                WHERE persona.id = ?";
        // Preparar la consulta
        $stmt = $this->conection->prepare($sql); 
        // Ejecutar la consulta con el valor del parámetro
        $stmt->execute([$Id]);
        
        // Devolver los resultados
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

            
    public function getPersonaInUsuario($Id) {
        $this->getConection(); // Establece la conexión a la base de datos
        // Consulta SQL mejorada
        $sql = "SELECT * 
                FROM persona
                INNER JOIN usuario ON persona.id = usuario.id
                WHERE persona.id = ?";
        // Preparar la consulta
        $stmt = $this->conection->prepare($sql); 
        // Ejecutar la consulta con el valor del parámetro
        $stmt->execute([$Id]);    
        // Devolver los resultados
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function DeletePersonaInDisertante($Id) {
        $this->getConection(); // Establece la conexión a la base de datos
        // Consulta SQL mejorada
        $sql = "DELETE FROM disertante WHERE `disertante`.`id` = ?";
        // Preparar la consulta
        $stmt = $this->conection->prepare($sql); 
        // Ejecutar la consulta con el valor del parámetro
        $stmt->execute([$Id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    

    //funciones de atributos//
    public function getPersonaByNombre($Nombre){
        $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
        $sql="SELECT * FROM ".$this->table." WHERE nombre = ?"; //consulta sql generica, ese signo ? es un valor
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute([$Nombre]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
        return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
    
    }

    public function getPersonaByApellidos($Apellidos){
        $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
        $sql="SELECT * FROM ".$this->table." WHERE Apellidos = ?"; //consulta sql generica, ese signo ? es un valor
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute([$Apellidos]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
        return $stmt->fetch(PDO::FETCH_ASSOC); //te manda solo 1 linea 
    
    }
    
    public function getPersonaByEmail($Email){
        $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
        $sql="SELECT * FROM ".$this->table." WHERE email = ?"; //consulta sql generica, ese signo ? es un valor
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute([$Email]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
        return $stmt->fetch(PDO::FETCH_ASSOC); //te manda solo 1 linea 
    
    }


//Cantidad de Registros numericamente
    
public function getCantidad(){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT count(*) as cantidad FROM ".$this->table; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute();//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetch(PDO::FETCH_ASSOC); //te manda solo 1 linea 

}



//Fin de paginacion::

//save;

public function save($param) {
    $this->getConection();

    $exists = FALSE;
    if (isset($param['id']) && ($param['id'] != "")) {
        $ActualInstancia = $this->getPersonaById($param['id']);

        if ($ActualInstancia) {
            $exists = TRUE;
            $this->Id = $ActualInstancia['id'];
            $this->Nombre = $ActualInstancia['nombre'];
            $this->Apellidos = $ActualInstancia['apellidos'];
            $this->Telefono = $ActualInstancia['telefono'];
            $this->Email = $ActualInstancia['email'];
        }
    }

    if (isset($param['id'])) {
        $this->Id = $param['id'];
    }

    if (isset($param['nombre'])) {
        $this->Nombre = $param['nombre'];
    }

    if (isset($param['apellidos'])) {
        $this->Apellidos = $param['apellidos'];
    }

    if (isset($param['telefono'])) {
        $this->Telefono = $param['telefono'];
    }

    if (isset($param['email'])) {
        $this->Email = $param['email'];
    }

    if ($exists) {
        $sql = "UPDATE ".$this->table." SET `nombre` = ?, `apellidos` = ?, `telefono` = ?, `email` = ? WHERE `id` = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([
            $this->Nombre, $this->Apellidos, $this->Telefono, $this->Email, $this->Id
        ]);
    } else {
        $sql = "INSERT INTO ".$this->table." (`nombre`, `apellidos`, `telefono`, `email`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([
            $this->Nombre, $this->Apellidos, $this->Telefono, $this->Email
        ]);
        $this->Id = $this->conection->lastInsertId();
    }
    return $this->Id;
}

public function deletePersonaById($id){ //empieza la funtion
    $this->getConection(); //ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    $sql="DELETE FROM ".$this->table." WHERE persona.`id` = ? "; //armamos la cadena sql 
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    return $stmt->execute([$id]); //ejecutamos la consulta
}

public function cargaPrueba(){ //creamos la funcion para cargar
    for ($i = 1; $i <= 47; $i++){ //definimos un rango de datos para cargar
 //datos del telefono a crear
$caracteristicas = generadorDatos::caracteristicaAleatoria(); 
$numeroTelefonico = generadorDatos::numeroTelefonicoAleatorio($caracteristicas);
$telefonoFormateado = $caracteristicas."-".$numeroTelefonico;
$Nombre = generadorDatos::nombreAleatorio(); //invocamos los metodos
$Apellidos = generadorDatos::apellidosAleatorios(); 
$Email = generadorDatos::emailAleatorio($Nombre,$Apellidos); //invocamos los metodos y les metemos valores
echo "<br>"."nombres generados: " . $Nombre;
echo "<br>"."apellidos generados: " . $Apellidos;
echo "<br>"."telefono formateado: " . $telefonoFormateado;
echo "<br>"."emails generados: " . $Email;

    $this->save(
        [
            'nombre' => $Nombre,
            'apellidos' => $Apellidos,
            'telefono' => $telefonoFormateado,
            'email' => $Email
        ]); 


} //fin del Bucle For
}//fin de la funcion

public function contendido($inicio = null, $final = null, $filtros = []){
    $this->getPersona(); // Cargar .
    
    // Comenzamos a construir la consulta SQL.
    $sql = "SELECT * FROM " . $this->table . " WHERE 1=1";

    // Si hay filtros, los añadimos a la consulta.
    if (!empty($filtros)) {
        if (isset($filtros['id'])) {
            $sql .= " AND id = :id";
        }
        if (isset($filtros['nombre'])) {
            $sql .= " AND nombre LIKE :nombre";
        }
        if (isset($filtros['apellidos'])) {
            $sql .= " AND apellidos LIKE :apellidos";
        }
        if (isset($filtros['telefono'])) {
            $sql .= " AND telefono LIKE :telefono";
        }

        if (isset($filtros['email'])) {
            $sql .= " AND email LIKE :email";
        }


    // Añadimos límites si están presentes.
    if (isset($inicio) && isset($final)) {
        $sql .= " LIMIT :inicio OFFSET :final";
    }

    // Preparamos la consulta.
    $stmt = $this->conection->prepare($sql);

    // Asignamos valores a los parámetros.
    if (isset($filtros['id'])) {
        $stmt->bindValue(':id', $filtros['id'], PDO::PARAM_INT);
    }
    if (isset($filtros['nombre'])) {
        $stmt->bindValue(':nombre', '%' . $filtros['nombre'] . '%', PDO::PARAM_STR);
    }
    if (isset($filtros['apellidos'])) {
        $stmt->bindValue(':apellidos', '%' . $filtros['apellidos'] . '%', PDO::PARAM_STR);
    }

    if (isset($filtros['telefono'])) {
        $stmt->bindValue(':telefono', '%' . $filtros['telefono'] . '%', PDO::PARAM_STR);
    }
  
    if (isset($filtros['email'])) {
        $stmt->bindValue(':email', '%' . $filtros['email'] . '%', PDO::PARAM_STR);
    }
    // Parámetros para la paginación.
    if (isset($inicio) && isset($final)) {
        $stmt->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
        $stmt->bindValue(':final', (int)$final, PDO::PARAM_INT);
    }

    // Ejecutamos la consulta.
    $stmt->execute();

    // Retornamos los resultados.
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}//fin de la funcion


public function accesoRapidoCarga(){
echo "creando la generacion de datos:"."<br>";
$p = new Persona();
$p->cargaPrueba();
}

public function getPersonaPaginacion($porPagina, $offset) {
    $this->getConection();
    $sql = "SELECT * FROM ".$this->table." LIMIT :porPagina OFFSET :offset";
    $stmt = $this->conection->prepare($sql);
    $stmt->bindValue(':porPagina', (int) $porPagina, PDO::PARAM_INT);
    $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function buscarPersonas($search) {
    $this->getConection(); //ejecuta un metodo de la clase que gestiona la conexion a la base de datos
    // Definir la consulta SQL con búsqueda en varios campos
    $sql = "SELECT * FROM " . $this->table . " 
            WHERE id LIKE :search 
            OR nombre LIKE :search 
            OR apellidos LIKE :search 
            OR telefono LIKE :search 
            OR email LIKE :search";

    // Preparar la consulta
    $stmt = $this->conection->prepare($sql);

    // Vincular el parámetro de búsqueda con comodines '%' para búsqueda parcial
    $searchTerm = '%' . $search . '%';
    $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    // Retornar los resultados como un array asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


public function buscarPersonasPorTermino($termino, $perPage, $offset) {
    $this->getConection(); // Asegura que la conexión a la BD esté disponible.

    // El formato para la consulta LIKE en SQL usando el término de búsqueda.
    $termino = "%" . $termino . "%"; 

    // Consulta SQL: buscamos en los campos nombre, apellidos, telefono y email.
    $query = "SELECT * FROM " . $this->table . " 
              WHERE nombre LIKE :termino 
                 OR apellidos LIKE :termino 
                 OR telefono LIKE :termino 
                 OR email LIKE :termino 
              LIMIT :offset, :perPage";

    try {
        // Preparamos la consulta.
        $stmt = $this->conection->prepare($query);
        
        // Vinculamos los parámetros para la consulta.
        $stmt->bindValue(':termino', $termino, PDO::PARAM_STR);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', (int) $perPage, PDO::PARAM_INT);
        
        // Ejecutamos la consulta.
        $stmt->execute();

        // Devolvemos los resultados como un array asociativo.
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // En caso de error, imprimimos la excepción para depuración.
        echo "Error en la consulta: " . $e->getMessage();
        return [];
    }
}


} //fin de la clase


?>