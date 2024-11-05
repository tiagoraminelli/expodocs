<?php
abstract class Depuracion {

    public static function id($integer, $min = '', $max = '') {
        $int = intval($integer);
        if ((($min !== '') && ($int < $min)) || (($max !== '') && ($int > $max))) {
            return false;
        }
        return $int;
    }

    public static function Nombres($string, $min = '', $max = '') {
        $string = preg_replace("/[^a-zA-ZñÑ]/", "", $string);
        $len = strlen($string);
        if ((($min !== '') && ($len < $min)) || (($max !== '') && ($len > $max))) {
            return false;
        }
        return $string;
    }

    public static function Apellidos($string, $min = '', $max = '') {
        $string = preg_replace("/[^a-zA-ZñÑ]/", "", $string);
        $len = strlen($string);
        if ((($min !== '') && ($len < $min)) || (($max !== '') && ($len > $max))) {
            return false;
        }
        return $string;
    }

    public static function Telefono($string, $max = 12) {
        // Permitir números y guiones en la cadena
        if (!preg_match("/^[\d-]+$/", $string)) {
            return false; // La cadena contiene caracteres no permitidos
        }

        // Eliminar los guiones de la cadena
        $string = str_replace('-', '', $string);

        // Verificar si la longitud de la cadena excede el máximo permitido
        if (strlen($string) > $max) {
            return false; // La longitud del número de teléfono excede el máximo permitido
        }

        return $string; // Devolver el número de teléfono limpio
    }

    public static function Biografia($string, $min = '', $max = '') {
        $string = preg_replace("/[^a-zA-Z0-9 ñÑ.@]/", "", $string);
        $len = strlen($string);
        if ((($min !== '') && ($len < $min)) || (($max !== '') && ($len > $max))) {
            return false;
        }
        return $string;
    }

    public static function Email($string) {
        if (preg_match("/^[^0-9][a-zA-ZñÑ0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $string)) {
            return $string;
        }
        return false;
    }

    public static function Redes($string, $min = '', $max = '') {
        $string = preg_replace("/[^a-zA-Z0-9ñÑ_.@]/", "", $string);
        $len = strlen($string);
        if ((($min !== '') && ($len < $min)) || (($max !== '') && ($len > $max))) {
            return false;
        }
        return $string;
    }

    public static function Url($url, $min = '', $max = '') {
        // Eliminar espacios en blanco al principio y al final de la URL
        $url = trim($url);
        
        // Expresión regular para validar una URL
        $pattern = '/^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/i';

        // Validar la URL con la expresión regular
        if (!preg_match($pattern, $url)) {
            return false; // La URL no coincide con el patrón
        }

        // Calcular la longitud de la URL
        $len = strlen($url);

        // Verificar si la longitud está dentro de los límites especificados
        if (($min !== '' && $len < $min) || ($max !== '' && $len > $max)) {
            return false; // La longitud de la URL no cumple con los requisitos
        }

        // La URL es válida, devolverla
        return $url;
    }
}
?>
