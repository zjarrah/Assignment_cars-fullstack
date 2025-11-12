<?php
require_once(__DIR__ . "/../connection/connection.php");
require_once(__DIR__ . "/../models/Car.php");
require_once(__DIR__ . "/../services/ResponseService.php");
require_once(__DIR__ . "/../services/CarServices.php");

class CarController {

    function getCars(){
        global $connection;

        if(isset($_GET["id"])){
            $id = $_GET["id"];

            $car = CarService::findCarByID($id);
            echo ResponseService::response(200, $car); 
            return;
        }else{
            $cars = Car::findAll($connection);
            echo ResponseService::response(200, $cars);
            return;
        }
    }


    function addCar(){
        global $connection;

        if(isset($_GET["name"]) && isset($_GET["year"]) && isset($_GET["color"])){
            $name = $_GET["name"];
            $year = $_GET["year"];
            $color = $_GET["color"];

            Car::insertCar($connection, $name, $year, $color);
            echo ResponseService::response(200, ["Car inserted!"]);
            return;
        }else{
            echo ResponseService::response(500, ["Field(s) missing!"]);
            return;
        }
    }


    function updateCar(){
        global $connection;

        if(isset($_GET["id"]) && isset($_GET["name"]) && isset($_GET["year"]) && isset($_GET["color"])){
            $id = $_GET["id"];
            $name = $_GET["name"];
            $year = $_GET["year"];
            $color = $_GET["color"];

            Car::updateCar($connection, $id, $name, $year, $color);
            echo ResponseService::response(200, ["Car updated!"]);
            return;
        }else{
            echo ResponseService::response(500, ["Field missing!"]);
            return;
        }
    }


    function deleteCar(){
        global $connection;

        if(isset($_GET["id"])){
            $id = $_GET["id"];

            Car::deleteCar($connection, $id);
            echo ResponseService::response(200, ["Car deleted!"]);
            return;
        }else{
            echo ResponseService::response(500, ["id missing"]);
            return;
        }
    }
}

?>