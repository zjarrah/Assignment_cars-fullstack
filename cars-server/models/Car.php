<?php
include("Model.php");

class Car extends Model {
    private int $id;
    private string $name;
    private int $year;
    private string $color;

    protected static string $table = "cars";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->year = $data["year"];
        $this->color = $data["color"];
    }

    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getColor(){
        return $this->color;
    }

    public function setColor(string $color){
        $this->color = $color;
    }

    public static function insertCar(mysqli $connection, string $name, int $year, string $color){
        $sql = sprintf("INSERT INTO %s (name, year, color) VALUES (?, ?, ?)",
            self::$table);

        $query = $connection->prepare($sql);
        $query->bind_param("sis", $name, $year, $color);
        $query->execute();               
    }

    public static function updateCar(mysqli $connection, int $id, string $name, int $year, string $color){
        $sql = sprintf("UPDATE %s SET name = ?, year = ?, color = ? WHERE id = ?",
            self::$table);

        $query = $connection->prepare($sql);
        $query->bind_param("sisi", $name, $year, $color, $id);
        $query->execute();               
    }


    public function __toString(){
        return $this->id . " | " . $this->name . " | " . $this->year. " | " . $this->color;
    }

    
    public function toArray(){
        return ["id" => $this->id, "name" => $this->name, "year" => $this->year, "color" => $this->color];
    }

}

?>