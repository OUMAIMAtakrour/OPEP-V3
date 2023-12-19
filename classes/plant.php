<?php

// require_once "config.php";
// require_once "config.php";
// class test
// {
//     public $connect;

//     public function __construct()
//     {
       
    
//     }
//     public function getPlants()
//     {
//         $sql = "SELECT * FROM plant";
//         $stmt = $this->connect->query($sql);
//         // $row = $stmt->fetchAll();

//         // return $row;
//         if ($stmt) {
//             $plantsDb = $stmt->fetchALL(PDO::FETCH_ASSOC);
//             $plants = array();
//             foreach ($plantsDb as $plant) {
//                 $plants[] = new plant($plant["Name"], $plant["price"], $plant["image"], $plant["CategorieId"]);
//             }
//             return $plants;
//         }
//         return null;
//     }
// }



include_once('config.php');

class Plant
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbc();
    }

    public function getAllPlants()
    {
        try {
            $query = 'SELECT * FROM plant';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getPlantById($plantId)
    {
        try {
            $query = 'SELECT * FROM plant WHERE IdPlant = :plantId';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":plantId", $plantId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Add more methods as needed for specific functionalities
}


