<?php
require_once 'Bd.php';
require_once 'Persona.php'; // Importamos la clase Persona para poder extenderla

class Usuario extends Persona {
    protected $table = "usuario"; // Creamos la tabla usuario
    protected $conection; // Protegemos el atributo de conexión
    protected $cantidad; // Protegemos la cantidad de disertantes

    private $idUsuario;
    private $Dni;
    private $Direccion;
    private $Password;
    private $PersonaId;

    function getConection() { // Creamos la conexión con la base de datos
        $db = new Db; // Crea un nuevo objeto base de datos
        $this->conection = $db->conection; // Le asigna el valor a conexión a la base de datos
    }

    // GETS
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getDni() {
        return $this->Dni;
    }

    public function getDireccion() {
        return $this->Direccion;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getPersonaId() {
        return $this->PersonaId;
    }

    // SETS
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    public function setDni($dni) {
        $this->Dni = $dni; // Asegúrate de asignar el valor
    }

    public function setDireccion($direccion) { // Ahora recibe el parámetro
        $this->Direccion = $direccion; // Asegúrate de asignar el valor
    }

    public function setPersonaId($personaId) { // Ahora recibe el parámetro
        $this->PersonaId = $personaId; // Asegúrate de asignar el valor
    }

    public function __construct($Dni = "", $Direccion = "", $Password = "", $PersonaId = "") { // Agrega el nuevo parámetro
        $this->Dni = $Dni;
        $this->Direccion = $Direccion;
        $this->Password = $Password;
        $this->PersonaId = $PersonaId; // Asigna el valor de PersonaId
    }

    // DEVUELVE EL LIST DE TODOS LOS DISERTANTES 
    public function getUsuarios() { // Creamos la conexión a la tabla
        $this->getConection(); // Ejecuta un método de la clase que gestiona la conexión a la base de datos
        
        // Consulta SQL con JOIN entre disertante y persona
        $sql = "
            SELECT 
                p.id,
                p.nombre,
                p.apellidos,
                p.telefono,
                p.email,
                u.dni,
                u.direccion,
                u.password,
                u.persona_id
            FROM 
                persona p
            JOIN 
                usuario u ON p.id = u.persona_id  
        "; 

        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        $stmt->execute(); // Ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorno de todos los resultados de la consulta
    }

    // ARMAMOS LA FUNCION DE INVOCAR LOS DATOS POR ID
    public function getUsuariosById($Id) {
        $this->getConection(); // Exactamente lo mismo que lo anterior
        $sql = "SELECT * FROM " . $this->table . " WHERE id = ?"; // Consulta SQL genérica
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        $stmt->execute([$Id]); // Ejecutamos la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna solo 1 línea
    }

    public function getUsuariosByPersonaId($Id) {
        $this->getConection(); // Exactamente lo mismo que lo anterior
        $sql = "SELECT * FROM " . $this->table . " WHERE persona_id = ?"; // Consulta SQL genérica
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        $stmt->execute([$Id]); // Ejecutamos la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna solo 1 línea
    }


    // ARMAMOS LA FUNCION DE INVOCAR LOS DATOS POR DNI
    public function getUsuariosByDni($Dni) {
        $this->getConection(); // Exactamente lo mismo que lo anterior
        $sql = "SELECT * FROM " . $this->table . " WHERE dni = ?"; // Consulta SQL genérica
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        $stmt->execute([$Dni]); // Ejecutamos la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna solo 1 línea 
    }

    // Función para sacar la cantidad
    public function getUsuariosPaginacion($porPagina, $offset) {
        try {
            $stmt = $this->conection->prepare("SELECT * FROM usuario LIMIT :porPagina OFFSET :offset");
            $stmt->bindParam(':porPagina', $porPagina, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            $arregloUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $arregloUsuarios;
        } catch (PDOException $e) {
            echo 'Error al obtener usuarios paginados: ' . $e->getMessage();
            return []; // En caso de error, retornar un arreglo vacío o manejar el error según tu aplicación
        }
    }

    public function getCantidad() {
        $this->getConection(); // Exactamente lo mismo que lo anterior
        $sql = "SELECT count(*) as cantidad FROM " . $this->table; // Consulta SQL genérica
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        $stmt->execute(); // Ejecutamos la consulta
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna solo 1 línea 
    }

    public function deleteUsuariosById($id) { // Empieza la función
        $this->getConection(); // Ejecuta un método de la clase que gestiona la conexión a la base de datos
        $sql = "DELETE FROM " . $this->table . " WHERE persona_id = ?"; // Armamos la cadena SQL 
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        return $stmt->execute([$id]); // Ejecutamos la consulta
    }

    public function deleteInscriptosByUsuarioId($id) {
        $this->getConection(); // Ejecuta un método de la clase que gestiona la conexión a la base de datos
        $sql = "DELETE FROM inscriptos WHERE usuario_id = ?";
        $stmt = $this->conection->prepare($sql); // Preparamos la consulta
        return $stmt->execute([$id]);
    }

    public function save($param) {
        $this->getConection();

        $exists = false;
        if (isset($param['idUsuario']) && !empty($param['idUsuario'])) {
            // Verificar si el usuario ya existe
            $actualUsuario = $this->getUsuariosById($param['idUsuario']);

            if ($actualUsuario) {
                $exists = true;
                $this->idUsuario = $actualUsuario['id'];
                $this->Dni = $actualUsuario['dni'];
                $this->Direccion = $actualUsuario['direccion'];
                $this->Password = $actualUsuario['password'];
                $this->PersonaId = $actualUsuario['idPersona'];
            }
        }


        // Asignar los parámetros al objeto
        if (isset($param['idUsuario'])) {
            $this->idUsuario = $param['idUsuario'];
        }
        if (isset($param['dni'])) {
            $this->Dni = $param['dni'];
        }
        if (isset($param['direccion'])) {
            $this->Direccion = $param['direccion'];
        }
        if (isset($param['password'])) {
            $this->Password =$param['password']; // Aseguramos que la contraseña esté cifrada
        }
        if (isset($param['idPersona'])) {
            $this->PersonaId = $param['idPersona'];
        }

        // Si el usuario ya existe, se actualiza
        if ($exists) {
            $sql = "UPDATE " . $this->table . " SET dni = ?, direccion = ?, password = ?, persona_id = ? WHERE idUsuario = ?";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([
                $this->Dni, $this->Direccion, $this->Password, $this->PersonaId, $this->idUsuario
            ]);
        } else {
            // Si no existe, se inserta uno nuevo
            $sql = "INSERT INTO " . $this->table . " (dni, direccion, password, persona_id) VALUES (?, ?, ?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->execute([
                $this->Dni, $this->Direccion, $this->Password, $this->PersonaId
            ]);
            $this->idUsuario = $this->conection->lastInsertId();
        }

        return $this->idUsuario;
    }

} // Fin de la clase
?>
