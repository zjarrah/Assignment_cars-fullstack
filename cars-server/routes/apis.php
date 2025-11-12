<?php 

//array of routes - a mapping between routes and controller name and method!
$apis = [
    'cars'         => ['controller' => 'CarController', 
                            'methods' => ['get'=>'getCars', 'add'=>'addCar', 'update'=>'updateCar', 'delete'=>'deleteCar']],
    'users'        => ['controller' => 'UserController', 'method' => 'getUsers']
];

?>