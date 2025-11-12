<?php
require_once(__DIR__ . "/../models/Car.php");
require_once(__DIR__ . "/../connection/connection.php");

//write business logic related to cars!!!
//BIAdmin.php

class CarService{

    static function findCarById($id){
        global $connection;
        $car = Car::find($connection, $id);
        $car = $car ? $car->toArray() : [];
        return $car;
    }
}

?>