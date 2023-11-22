<?php
class datosController{
    public static function index(){
        include 'database/database.php';
        include 'views/datos/datos.php';
    }

    public static function ingresar(){
        include 'middleware/datos.php';
    }

    
    public static function mostrar(){
        include 'middleware/datos-mostrar.php';
    }

}