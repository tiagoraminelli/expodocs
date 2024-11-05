<?php
require_once 'Bd.php'; // Importamos la clase de conexión a base de datos

class Evento {
    protected $table = "evento"; // Nombre de la tabla
    protected $conection; // Conexión protegida
    protected $cantidad; // Para almacenar la cantidad de eventos

    private $id;
    private $titulo;
    private $slug;
    private $descripcion;
    private $fecha;
    private $hora;
    private $duracion;
    private $idioma;
    private $disertante_id;

    // Método para obtener la conexión a la base de datos
    function getConection() {
        $db = new Db(); // Crea un nuevo objeto para gestionar la conexión
        $this->conection = $db->conection; // Asigna la conexión de la clase Db
    }

    // Getters

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getIdioma() {
        return $this->idioma;
    }

    public function getDisertanteId() {
        return $this->disertante_id;
    }

    // Setters

    public function setId() {
        return $this->id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setSlug($slug) {
        $this->slug = $slug;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function setIdioma($idioma) {
        $this->idioma = $idioma;
    }

    public function setDisertanteId($disertante_id) {
        $this->disertante_id = $disertante_id;
    }

    // Constructor
    public function __construct($titulo = "", $slug = "", $descripcion = "", $fecha = "", $hora = "", $duracion = "", $idioma = "", $disertante_id = 0) {
        $this->titulo = $titulo;
        $this->slug = $slug;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->duracion = $duracion;
        $this->idioma = $idioma;
        $this->disertante_id = $disertante_id;
    }

    // Método para obtener todos los eventos
    public function getEventos() {
        $this->getConection();
        $sql = "SELECT e.*,
                d.*, 
                concat(p.nombre,' ',p.apellidos) as NombreCompleto
                FROM evento AS e
                JOIN disertante AS d ON e.disertante_id = d.id
                JOIN persona AS p ON d.id = p.id;
                ";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOnlyEventos() {
        $this->getConection();
        $sql = "SELECT * FROM ".$this->table."";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // Obtener evento por ID
    public function getEventoById($id) {
        $this->getConection();
        $sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDatosEventoById($id) {
        $this->getConection();
        $sql = "SELECT *
                FROM evento
                INNER JOIN disertante ON evento.disertante_id = disertante.id
                INNER JOIN persona ON disertante.persona_id = persona.id
                WHERE evento.id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

       // Obtener evento por ID del Disertante
public function getEventosByDisertanteId($idD /*id del disertante */){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT * FROM ".$this->table." WHERE disertante_id = ?"; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute([$idD]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetchAll(PDO::FETCH_ASSOC);//te manda solo 1 linea
}

public function getEventosByDisertanteIds($disertanteIds) {
    $this->getConection();  // Establecer la conexión con la base de datos

    // Asegurarse de que los disertanteIds sea un arreglo no vacío
    if (empty($disertanteIds)) {
        return [];  // Si no hay IDs, devolvemos un arreglo vacío
    }

    // Convertimos el arreglo de IDs a una lista separada por comas
    $placeholders = implode(',', array_fill(0, count($disertanteIds), '?'));

    // Consulta SQL para obtener los eventos asociados a los disertantes específicos
    // Filtramos por disertante_id en la tabla eventos
    $sql = "SELECT e.id, e.titulo, e.descripcion, e.fecha, e.hora, e.duracion, e.idioma, e.disertante_id 
            FROM evento e
            WHERE e.disertante_id IN ($placeholders)";  // Usamos IN para pasar múltiples IDs de disertante

    // Preparar la consulta
    $stmt = $this->conection->prepare($sql);

    // Ejecutar la consulta pasando todos los disertanteIds
    $stmt->execute($disertanteIds);

    // Recuperar los eventos y devolverlos como un arreglo asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

   

       // Obtener evento por Idioma
public function getEventosByIdioma($Idioma){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT * FROM ".$this->table." WHERE idioma = ?"; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute([$Idioma]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
}


public function getEventosAleatorios($cantidad = 8) {
    $this->getConection(); // Establece la conexión con la base de datos

    // Validamos que $cantidad sea un número entero positivo
    if (!is_int($cantidad) || $cantidad <= 0) {
        $cantidad = 8; // Default si no se pasa un valor correcto
    }

    // Consulta SQL para obtener una cantidad aleatoria de eventos
    $sql = "SELECT * FROM " . $this->table . " ORDER BY RAND() LIMIT " . (int)$cantidad; // Convertir cantidad a entero

    // Preparamos la consulta SQL
    $stmt = $this->conection->prepare($sql);

    // Ejecutamos la consulta
    $stmt->execute();

    // Devolvemos los resultados obtenidos como un arreglo asociativo
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


       // Obtener evento por Idioma
       public function getCantidadEventos(){
        $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
        $sql="SELECT count(*) as cantidad FROM ".$this->table.""; //consulta sql generica, ese signo ? es un valor
        $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
        $stmt->execute();//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
        return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
    }


       // Obtener evento por Idioma
public function deleteEventoByIdEvento($id){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT * FROM ".$this->table." WHERE evento.id = ?"; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute([$id]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
    }

           // Obtener evento por Idioma
public function deleteEventoByDisertanteId($id){
    $this->getConection(); //EXACTAMENTE LO MISMO QUE LO ANTERIOR
    $sql="SELECT * FROM ".$this->table." WHERE disertante_id = ?"; //consulta sql generica, ese signo ? es un valor
    $stmt=$this->conection->prepare($sql); //metemos la cadena que armamos para armar la consulta
    $stmt->execute([$id]);//aca metemos todos los valores al ? pero tenemos que tener en cuenta el ORDEN
    return $stmt->fetch(PDO::FETCH_ASSOC);//te manda solo 1 linea
}
    // Obtener paginacion

public function getPaginasPorEventos($porPagina, $offset) {
    try {
        $stmt = $this->conection->prepare("SELECT * FROM evento LIMIT :porPagina OFFSET :offset");
        $stmt->bindParam(':porPagina', $porPagina, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $arregloUsuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $arregloUsuarios;
    } catch (PDOException $e) {
        echo 'Error al obtener eventos paginados: ' . $e->getMessage();
        return []; // En caso de error, retornar un arreglo vacío o manejar el error según tu aplicación
    }
}

// Método SAVE para editar o crear un evento
public function save($param) {
    $this->getConection(); // Conexión a la base de datos
    $exists = false;
    // Verificar si existe el ID
    if (isset($param['id']) && ($param['id'] != "")) {
        $ActualInstancia = $this->getEventoById($param['id']); // Obtener el evento según el ID
        if ($ActualInstancia) {
            // Si existe el evento, setear valores actuales para hacer un UPDATE
            $exists = true;
            $this->id = $ActualInstancia['id'];
            $this->titulo = $ActualInstancia['titulo'];
            $this->slug = $ActualInstancia['slug'];
            $this->descripcion = $ActualInstancia['descripcion'];
            $this->fecha = $ActualInstancia['fecha'];
            $this->hora = $ActualInstancia['hora'];
            $this->duracion = $ActualInstancia['duracion'];
            $this->idioma = $ActualInstancia['idioma'];
            $this->disertante_id = $ActualInstancia['disertante_id'];
        }
    }

    // Setear valores recibidos en el arreglo $param
    if (isset($param['id'])) $this->id = $param['id'];
    if (isset($param['titulo'])) $this->titulo = $param['titulo'];
    if (isset($param['slug'])) $this->slug = $param['slug'];
    if (isset($param['descripcion'])) $this->descripcion = $param['descripcion'];
    if (isset($param['fecha'])) $this->fecha = $param['fecha'];
    if (isset($param['hora'])) $this->hora = $param['hora'];
    if (isset($param['duracion'])) $this->duracion = $param['duracion'];
    if (isset($param['idioma'])) $this->idioma = $param['idioma'];
    if (isset($param['disertante_id'])) $this->disertante_id = $param['disertante_id'];

    // Si el evento existe, hacer un UPDATE
    if ($exists) {
        $sql = "UPDATE `evento` 
                SET `titulo` = ?, `slug` = ?, `descripcion` = ?, `fecha` = ?, `hora` = ?, `duracion` = ?, `idioma` = ?, `disertante_id` = ? 
                WHERE `id` = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([
            $this->titulo,
            $this->slug, 
            $this->descripcion, 
            $this->fecha, 
            $this->hora, 
            $this->duracion, 
            $this->idioma, 
            $this->disertante_id, 
            $this->id
        ]);
    } else {
        // Si no existe, hacer un INSERT
        $sql = "INSERT INTO `evento` (`titulo`, `slug`, `descripcion`, `fecha`, `hora`, `duracion`, `idioma`, `disertante_id`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([
            $this->titulo, 
            $this->slug, 
            $this->descripcion, 
            $this->fecha, 
            $this->hora, 
            $this->duracion,
            $this->idioma, 
            $this->disertante_id
        ]);
        $this->id = $this->conection->lastInsertId(); // Obtener el ID generado automáticamente
    }

    return $this->id; // Retorna el ID del registro guardado o actualizado
}
} //fin de la clase




?>