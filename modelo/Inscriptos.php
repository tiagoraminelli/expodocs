<?php
require_once 'Bd.php'; // Clase de conexión a la base de datos
require_once 'Evento.php'; //Extendemos la clase evento
class Inscriptos extends Evento {
    protected $table = "inscriptos"; // Nombre de la tabla intermedia
    protected $conection; // Conexión protegida

    private $usuario_id;
    private $evento_id;

    // Método para obtener la conexión a la base de datos
    function getConection() {
        $db = new Db(); // Crea un nuevo objeto para gestionar la conexión
        $this->conection = $db->conection; // Asigna la conexión de la clase Db
    }

    // Getters
    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function getEventoId() {
        return $this->evento_id;
    }

    // Setters
    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function setEventoId($evento_id) {
        $this->evento_id = $evento_id;
    }

    // Constructor
    public function __construct($usuario_id = 0, $evento_id = 0) {
        $this->usuario_id = $usuario_id;
        $this->evento_id = $evento_id;
    }

    //obtener los datos de las usuarios y eventos
    public function getEventosAndUsuarios() {
        $this->getConection();
        $sql = "SELECT 
        ins.usuario_id,
        ins.evento_id,
        e.id, -- evento id
        e.titulo,
        u.id, -- usuario id 
        u.dni,
        p.id, -- persona id
        p.nombre,
        p.apellidos
        FROM inscriptos as ins
        JOIN usuario as u ON ins.usuario_id = u.id 
        JOIN persona as p ON u.id = p.id
        JOIN evento as e on ins.evento_id = e.id;
        " ;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countInscriptosByIdUser($idUsuario) {
        $this->getConection();
        $sql = "SELECT COUNT(*) as cantidad FROM `inscriptos` WHERE usuario_id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$idUsuario]); // Ejecuta la consulta con los valores
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['cantidad'];
    }

    // Método para obtener todos los eventos asociados a un usuario
    public function getEventosByUsuarioId($id /*id del usuario*/) {
        $this->getConection();
        $sql = "SELECT 
        ins.usuario_id,
        ins.evento_id,
        e.id, -- evento id
        e.titulo,
        u.id, -- usuario id 
        u.dni
        FROM inscriptos as ins
        JOIN usuario as u ON ins.usuario_id = u.id 
        JOIN evento as e on ins.evento_id = e.id
        Where ins.usuario_id = ?
        " ;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    

    // Método para obtener todos los usuarios asociados a un evento
    public function getUsuariosByEventoId($id) {
        $this->getConection();
        $sql = "
            SELECT 
        ins.usuario_id,
        ins.evento_id,
        e.id, -- evento id
        e.titulo,
        u.id, -- usuario id 
        u.dni
        FROM inscriptos as ins
        JOIN usuario as u ON ins.usuario_id = u.id 
        JOIN evento as e on ins.evento_id = e.id
        Where ins.evento_id = ?
        ";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

      // 1. Método para borrar un registro según usuario_id y evento_id
      public function deleteByUsuarioAndEvento($usuario_id, $evento_id) {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE usuario_id = ? AND evento_id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$usuario_id, $evento_id]); // Ejecuta la consulta con los valores
    }

    // 2. Método para borrar todos los eventos asociados a un usuario
    public function deleteEventosByUsuarioId($usuario_id) {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE usuario_id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$usuario_id]); // Elimina todas las relaciones con ese usuario
    }


    public function estaInscripto($evento_id, $usuario_id) {
        $this->getConection();
        
        $sql = "SELECT * FROM " . $this->table . " WHERE evento_id = ? AND usuario_id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$evento_id, $usuario_id]);
    
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
    
    public function insertarInscripcion($evento_id, $usuario_id) {
        if ($this->estaInscripto($evento_id, $usuario_id)) {
            return false;  // El usuario ya está inscrito
        }
    
        $this->getConection();
        $fecha_hoy = date('Y-m-d');
        $sql = "INSERT INTO " . $this->table . " (evento_id, usuario_id, fecha_carga) VALUES (?, ?, ?)";
        $stmt = $this->conection->prepare($sql);
    
        return $stmt->execute([$evento_id, $usuario_id, $fecha_hoy]);
    }
    
    
    // 3. Método para borrar todos los usuarios asociados a un evento
    public function deleteUsuariosByEventoId($evento_id) {
        $this->getConection();
        $sql = "DELETE FROM " . $this->table . " WHERE evento_id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$evento_id]); // Elimina todas las relaciones con ese evento
    }

}



?>