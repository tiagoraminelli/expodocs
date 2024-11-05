<?php
//ESTA CLASE VA A LIB
include 'GeneradorLorem.php';

abstract class GeneradorDatos { //se define asi pq es abstracta
//----------------------separador de funciones ----------------------

public static function numeroAleatorio(){
    // Genera un número aleatorio entre 30 y 50
    $numero = mt_rand(336, 350);

    // Convierte el número a cadena (VARCHAR)
    $numeroComoString = strval($numero);

    return $numeroComoString;
}

//----------------------separador de funciones ----------------------
public static function idiomasAleatorios() {
    $idiomas = [
        "Inglés",
        "Español",
        "Francés",
        "Alemán",
        "Italiano",
        "Portugués",
        "Chino (Mandarín)",
        "Japonés",
        "Coreano",
        "Ruso",
        "Árabe",
        "Bengalí",
        "Turco",
        "Holandés",
        "Sueco",
        "Polaco",
        "Danés",
        "Noruego",
        "Finlandés"
    ];

    // Escoge un idioma aleatorio del arreglo
    $idiomaAleatorio = $idiomas[array_rand($idiomas)];

    return $idiomaAleatorio;
}

//----------------------separador de funciones ----------------------

public static function horaAleatoria() {
    // Genera un número aleatorio entre 0 y 95 para representar los intervalos de 15 minutos
    $intervalo = mt_rand(0, 95);

    // Calcula la hora y los minutos basados en el intervalo
    $horas = floor($intervalo / 4); // 4 intervalos por hora
    $minutos = ($intervalo % 4) * 15; // 15 minutos por intervalo

    // Formatea la hora en formato HH:mm
    $horaAleatoria = sprintf('%02d:%02d', $horas, $minutos);

    return $horaAleatoria;
}
//----------------------separador de funciones ----------------------
public static function timeAleatoria() {
    // Genera un número aleatorio entre 1 y 8 para las horas
    $horas = mt_rand(1, 8);

    // Genera un número aleatorio entre 0 y 11 para los bloques de 5 minutos (0, 5, 10, ..., 55)
    $minutos = mt_rand(0, 11) * 5;

    // Formatea la duración en formato HH:mm
    $duracion = sprintf('%02d:%02d', $horas, $minutos);

    return $duracion;
}
//----------------------separador de funciones ----------------------

    public static function dateAleatoria() {
        // Genera una fecha aleatoria entre el 1 de enero de 2000 y el 31 de diciembre de 2023
        $timestamp = mt_rand(strtotime('2024-01-01'), strtotime('2024-12-31'));
        $fechaAleatoria = date('Y-m-d', $timestamp);
        return $fechaAleatoria;
    }

//----------------------separador de funciones ----------------------
    static public function titulosAleatorios($num = 1){ //creamos la funcion y definimos que reciba por parametro la cantidad de bucles que hara
        $titulos = [
            "Conferencia Internacional de Tecnología 2024",
            "Feria de Innovación y Diseño",
            "Expo Emprendedores 2024",
            "Cumbre Global de Sostenibilidad",
            "Festival Internacional de Arte Contemporáneo",
            "Semana de la Moda 2024",
            "Congreso Mundial de Inteligencia Artificial",
            "Cumbre Mundial de Energías Renovables",
            "Foro Global de Economía Digital",
            "Simposio Internacional de Neurociencia",
            "Conferencia Internacional de Robótica Avanzada",
            "Feria de Startups y Tecnología",
            "Encuentro Global de Innovación Social",
            "Congreso Mundial de Ciencia y Tecnología",
            "Expo Virtual de Realidad Aumentada",
            "Cumbre Internacional de Blockchain",
            "Festival de Música Electrónica 2024",
            "Simposio de Bioingeniería",
            "Conferencia Global de Seguridad Cibernética",
            "Cumbre Mundial de Cambio Climático",
            "Expo Internacional de Automatización Industrial",
            "Foro de Economía Circular",
            "Congreso Mundial de Salud Digital",
            "Feria de Turismo Sostenible",
            "Simposio de Inteligencia Ambiental"
        ];
            
        
        $cadenaTitulos = "";
        $claves = array_rand($titulos,$num); // creamos las claves para recorrer el arreglo con la funcion
            if(is_array($claves)){ //comprovamos que es UN ARREGLO
                for($i=0;$i<$num;$i++){ //lo recorremos
                    $cadenaTitulos.= $titulos[$claves[$i]]." "; //lo concatenamos en una cadena 
                  
                }
            }else{
                $cadenaTitulos = $titulos[$claves];
            }
        return $cadenaTitulos;
        
        }

//----------------------separador de funciones ----------------------

static public function passwordAleatoria($longitud = 8) {
        // Caracteres posibles para la Password
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Longitud máxima de los caracteres disponibles
        $numCaracteres = strlen($caracteres);
    
        // Inicializar la Password vacía
        $password = '';
    
        // Generar Password aleatoria
        for ($i = 0; $i < $longitud; $i++) {
            $indice = random_int(0, $numCaracteres - 1); // Generar índice aleatorio
            $password .= $caracteres[$indice]; // Concatenar el carácter correspondiente
        }
    
        return $password;
}


//----------------------separador de funciones ----------------------

static public function dniAleatorio(){
//numero irrepetible de hasta 8 caracteres 
$dni = '';
// Genera un número aleatorio de hasta 8 dígitos
$numeroAleatorio = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
$dni = substr($numeroAleatorio, 0, 2).substr($numeroAleatorio, 2, 3).substr($numeroAleatorio, 5, 3);
return $dni;
}

//----------------------separador de funciones ----------------------
static public function direccionAleatorio(){
//nombre de la calle y numero
$nombreDirrecion = array(
    "Avenida de Mayo", "Corrientes", "9 de Julio", "Florida", "Santa Fe",
    "Callao", "Lavalle", "Reconquista", "Tucumán", "Belgrano",
    "Sarmiento", "Rivadavia", "San Martín", "Córdoba", "Perón",
    "Independencia", "Diagonal Norte", "Diagonal Sur", "Paraná", "Bartolomé Mitre",
    "Paseo Colón", "Hipólito Yrigoyen", "Bernardo de Irigoyen", "Alsina", "Carlos Pellegrini",
    "Lima", "Carlos Calvo", "Piedras", "Chile", "Madero",
    "Maipú", "Santiago del Estero", "Uruguay", "Esmeralda", "Suipacha",
    "Cerrito", "Montevideo", "Lorena", "Ayacucho", "Luis María Campos",
    "Montañeses", "Ortega y Gasset", "Humboldt", "Gurruchaga", "Charcas",
    "Armenia", "Nicaragua", "Fitz Roy"
    // Agrega más calles aquí según sea necesario
);

// Selecciona una calle aleatoria del arreglo
$calleAleatoria = $nombreDirrecion[array_rand($nombreDirrecion)];

// Genera un número aleatorio de hasta 4 dígitos
$numeroDireccion = mt_rand(1, 99999);

// Concatena el número aleatorio a la calle
$direccionAleatoria = $calleAleatoria . " " . $numeroDireccion;
return $direccionAleatoria;
}



//----------------------separador de funciones ----------------------
static public function nombreAleatorio($num = 1){ //
    //definimos un array con nombres ya cargados
    $arregloNombres = [
        "Juan", "María", "José", "Ana", "Pedro", "Laura", "Carlos", "Sofía", "Luis", "Elena",
        "Miguel", "Lucía", "Pablo", "Carmen", "Diego", "Martina", "Javier", "Paula", "Francisco", "Alba",
        "Antonio", "Isabel", "Manuel", "Sara", "Jorge", "Raquel", "Fernando", "Eva", "Daniel", "Natalia",
        "Adrián", "Beatriz", "Rubén", "Patricia", "Alejandro", "Silvia", "David", "Clara", "Álvaro", "Miriam",
        "Alberto", "Marina", "Rafael", "Cristina", "Joaquín", "Inés", "Enrique", "Alicia", "Santiago", "Celia",
        "Víctor", "Marta", "Andrés", "Lucas", "Roberto", "Ángela", "Tomás", "Lorena", "Emilio", "Noelia",
        "Diego", "María José", "Óscar", "Esther", "Guillermo", "Julia", "Jesús", "Rosa", "Adrià", "Irene",
        "Álex", "Mónica", "Jordi", "Judith", "Mikel", "Nerea", "Marc", "Cristina", "Iker", "Eider",
        "Oriol", "Mariona", "Txema", "Ane", "Unai", "Leire", "Iñaki", "Irati", "Jon", "Maite"
    ];
    $cadenaNombres = "";
    $claves = array_rand($arregloNombres,$num); // creamos las claves para recorrer el arreglo con la funcion
    if(is_array($claves)){ //comprovamos que es UN ARREGLO
        for($i=0;$i<$num;$i++){ //lo recorremos
            $cadenaNombres.= $arregloNombres[$claves[$i]]." "; //lo concatenamos en una cadena 
          
        }
    }else{
        $cadenaNombres = $arregloNombres[$claves];
    }
    return $cadenaNombres;
}



//----------------------separador de funciones ----------------------

static public function apellidosAleatorios($num = 1){ //creamos la funcion y definimos que reciba por parametro la cantidad de bucles que hara
$arregloApellidos = [
    "García", "Fernández", "González", "Rodríguez", "López", "Martínez", "Sánchez", "Pérez", "Martín", "Gómez",
    "Ruiz", "Díaz", "Hernández", "Jiménez", "Álvarez", "Moreno", "Muñoz", "Romero", "Alonso", "Gutiérrez",
    "Navarro", "Torres", "Domínguez", "Vázquez", "Ramos", "Gil", "Ramírez", "Serrano", "Blanco", "Suárez",
    "Molina", "Morales", "Ortega", "Delgado", "Castro", "Ortiz", "Rubio", "Marín", "Santiago", "Iglesias",
    "Sanz", "Núñez", "Garrido", "Cortés", "Reyes", "Medina", "Guerrero", "Cabrera", "Flores", "Lozano",
    "Castillo", "Prieto", "Cano", "Cruz", "Calvo", "Herrera", "Aguilar", "Pascual", "Santos", "Pastor",
    "Vidal", "Carmona", "Ferrer", "Rivas", "León", "Vega", "Bravo", "Arias", "Campos", "Carrasco",
    "Olivares", "Crespo", "Méndez", "Pardo", "Esteban", "Mora", "Solís", "Parra", "Vila", "Valero",
    "Vargas", "Vicente", "Aguirre", "Moya", "Rojas", "Herrero", "Nieto", "Salgado", "Estévez", "Valle",
    "Merino", "Marcos", "Téllez", "Caballero", "Bueno", "Castaño", "Coronado", "Pacheco", "Montero", "Saucedo","Smith", "Johnson", "Williams", "Brown", "Jones","Miller", "Davis", "Garcia", "Wilson", "Martinez","Anderson", "Taylor", "Thomas", "Hernandez", "Moore","Martin", "Jackson", "Thompson", "White", "Lopez",
    "Lee", "Gonzalez", "Harris", "Clark", "Lewis","Robinson", "Walker", "Hall", "Young", "Allen",
    "King", "Wright", "Scott", "Torres", "Nguyen","Hill", "Green", "Adams", "Baker", "Nelson"
        
];
    

$cadenaApellidos = "";
$claves = array_rand($arregloApellidos,$num); // creamos las claves para recorrer el arreglo con la funcion
    if(is_array($claves)){ //comprovamos que es UN ARREGLO
        for($i=0;$i<$num;$i++){ //lo recorremos
            $cadenaApellidos.= $arregloApellidos[$claves[$i]]." "; //lo concatenamos en una cadena 
          
        }
    }else{
        $cadenaApellidos = $arregloApellidos[$claves];
    }
return $cadenaApellidos;

}



//----------------------separador de funciones ----------------------


static public function emailAleatorio($nom,$ape){ //
        //Acomodamos los parametros que recibimos
    $nombre = substr($nom,0,1);
    $apellido = $ape;
    $signos= "@";
        //definimos un array con emails ya cargados
    $arregloEmails = [
        "Gmail.com", "Outlook.com", "Yahoo.com", "AOL.com", "ProtonMail.com", "Zoho.com", "Mail.com", "GMX.com",
        "Yandex.com", "Tutanota.com", "FastMail.com", "iCloud.com", "Mail.ru", "Hushmail.com", "Lycos.com",
        "Rackspace.com", "Runbox.com", "Mailinator.com", "Disroot.org", "OpenMailBox.org", "Posteo.de", "StartMail.com",
        "CounterMail.com", "ScryptMail.com", "Safe-mail.net", "Cock.li", "GuerrillaMail.com", "TrashMail.com",
        "TempMail.org", "10MinuteMail.com", "MailDrop.cc", "MinuteInbox.com", "Blur.com", "AnonEmail.net",
        "Ctemplar.com", "SecMail.pro", "ProtonMail.ch", "HideMyAss.com", "Securenym.net", "VFEmail.net",
        "Mykolab.com", "LuxSci.com", "Neomailbox.com", "Mailfence.com", "Torguard.net", "VFEmail.net",
        "Unseen.is", "ScryptMail.com"
    ];
    
    $cadenaEmail = "";
    $claves = array_rand($arregloEmails); // creamos las claves para recorrer el arreglo con la funcion

    $cadenaEmail = $nombre.$apellido.$signos.$arregloEmails[$claves]; //CONCATENAMOS TODO

    return $cadenaEmail;

}

//----------------------separador de funciones ----------------------



static public function loremAleatorio($num = 1){
    return generadorLorem::ipsum($num);
}


//----------------------separador de funciones ----------------------



static public function caracteristicaAleatoria(){ // se crea la funcion
$caracteristicas = ["11"];
for ($i=200;$i<=3999;$i++){
    $caracteristicas[] = $i;
}



$claves = array_rand($caracteristicas);
return $caracteristicas[$claves];

}



//----------------------separador de funciones ----------------------



static public function numeroTelefonicoAleatorio($caracteristicas){ //primero recibir la caracteristica y preguntar el rango
    /*
    si largo es = 2, rango (10.000.000 a 99.999.999);
    si largo es = 3, rango (1.000.000 a 9.999.999);
    si largo es = 4, rango (100.000 a 999.999);
    */

    $longitud = strlen($caracteristicas); //contamos

    if ($longitud == 2){
        $numerosTelefono[0] = 10000000;
        $numerosTelefono[1] = 99999999;

         
    }else if ($longitud == 3){
        $numerosTelefono[0] = 1000000;
        $numerosTelefono[1] = 9999999;

         
    }else if ($longitud == 4){
        $numerosTelefono[0] = 100000;
        $numerosTelefono[1] = 999999;
       
    }
    $numerosTelefono=rand($numerosTelefono[0],$numerosTelefono[1]);
    return $numerosTelefono;    
    }

//----------------------separador de funciones ----------------------
static public function urlAleatorio($cadena){
$paisAleatorio = [".com",".ar",".uk",".br",".ru",".go",".net",".ger"]; //creamos la terminacion
$valorAleatorio = [".aorta",".faktu",".dominar",".loaser",".vikctum",".portma",".adee",".geadras"]; //creamos los dominios
$clavePais = array_rand($paisAleatorio); //la randomizamos
$claveDominio = array_rand($paisAleatorio); //la randomizamos
$url = "www.".$cadena.$valorAleatorio[$claveDominio].$paisAleatorio[$clavePais]; //la creamos


return $url; //la mandamos
}


//----------------------separador de funciones ----------------------


static public function socialAleatorio($cadena,$red){ //recibe dos parametros dentro
    if($red == "x"){ //si es x

        $socialMedia = "www/".$red."/".$cadena.".x";

    }else if ($red == "linkedin"){ //si es linkedin

        $socialMedia = "www/".$red."/".$cadena.".lik";

    }else { //si es una random

        $socialMedia = "www/".$red."/".$cadena.".com";

    };
return $socialMedia;
}

//comentar en todo caso pero yo las cree por las dudas
static public function twitterAleatorio($nombre,$apellido){
    $twitterGenerado = "https://x/@".$nombre.$apellido."status/";
return $twitterGenerado;
}
static public function linkedinAleatorio($nombre,$apellido){

    $linkedinGenerado = "https://www.linkedin.com/in/".$nombre.$apellido.".lik";
return $linkedinGenerado;
}


    

} //fin de la funcion

/*
//STACK OVERFLOW, cuando queres acceder a algo del arreglo que no esta cargado
$nombresgenerados = generadorDatos::nombreAleatorio();
$apellidosgenerados = generadorDatos::apellidosAleatorios();
$emailsGenerados = GeneradorDatos::emailAleatorio($nombresgenerados,$apellidosgenerados); //asignamos a una variable la funcion con los parametros
$telefono = generadorDatos::caracteristicaAleatoria();
$numerosTelefono = generadorDatos::numeroTelefonicoAleatorio($telefono);
$urlGenerado = generadorDatos::urlAleatorio($nombresgenerados);
$socialGenerado = generadorDatos::socialAleatorio($nombresgenerados,"x");
$xGenerado = generadorDatos::twitterAleatorio($nombresgenerados,$apellidosgenerados);
$linkGenerado = generadorDatos::linkedinAleatorio($nombresgenerados,$apellidosgenerados);

// Imprime los nombres generados para verificar
echo "<br>"."nombres generados: " . $nombresgenerados;
echo "<br>"."apellidos generados: " . $apellidosgenerados;
echo "<br>"."emails generados: " . $emailsGenerados;
echo "<br>"."caracteristicas telefonicos generados: " . $telefono;
echo "<br>"."numeros telefonicos generados: " . $numerosTelefono;
echo "<br>"."url generados: " . $urlGenerado;
echo "<br>"."x generados: " . $xGenerado; 
echo "<br>"."linkedin generados: " . $linkGenerado; 

*/









?>