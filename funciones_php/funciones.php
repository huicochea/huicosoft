<?php

function getRealUserIp(){//Obtener la ip del usuario 
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

function obtenToken($longitud) {
        //crear alfabeto
        $mayus = "ABCDEFGHIJKMNPQRSTUVWXYZ";
        $mayusculas = str_split($mayus);    //Convertir a array
        //crear array de numeros 0-9
        $numeros = range(0,9);
        //revolver arrays
        shuffle($mayusculas);
        shuffle($numeros);
        //Unir arrays
        $arregloTotal = array_merge($mayusculas,$numeros);
        $newToken = "";
        
        for($i=0;$i<=$longitud;$i++) {
                $miCar = obtenCaracterAleatorio($arregloTotal);
                $newToken .= obtenCaracterMd5($miCar);
        }
        return $newToken;
}

function obtenCaracterAleatorio($arreglo) {
        $clave_aleatoria = array_rand($arreglo, 1); //obtén clave aleatoria
        return $arreglo[ $clave_aleatoria ];    //devolver ítem aleatorio
}
 
function obtenCaracterMd5($car) {
        $md5Car = md5($car.Time()); //Codificar el carácter y el tiempo POSIX (timestamp) en md5
        $arrCar = str_split(strtoupper($md5Car));   //Convertir a array el md5
        $carToken = obtenCaracterAleatorio($arrCar);    //obtén un ítem aleatoriamente
        return $carToken;
}

?>