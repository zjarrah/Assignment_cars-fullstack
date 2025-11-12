<?php
abstract class Model{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $connection, int $id){
        $sql = sprintf("SELECT * from %s WHERE %s = ?",
                       static::$table,
                       static::$primary_key);

        $query = $connection->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();               

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }


    public static function findAll(mysqli $connection){
        //implement this
        $sql = sprintf("SELECT * from %s", static::$table);
        
        $query = $connection->prepare($sql);
        $query->execute();               

        $array = $query->get_result();

        $data = [];

        while($article = $array->fetch_assoc()){
            $car = new static($article);
            $data[] = $car->toArray();
        }

        return $data;
    }


    public static function deleteCar(mysqli $connection, int $id){
        $sql = sprintf("DELETE FROM %s WHERE id = ?",
            static::$table);

        $query = $connection->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();               
    }

}



?>
