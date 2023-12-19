<?php
class plants
{

    private $Name;
    private $price;
    private $image;
    private $categorieId;

    public function __construct($Name, $price, $image, $categorieId)
    {
        $this->Name = $Name;
        $this->image = $image;
        $this->price = $price;
        $this->categorieId = $categorieId;
    }

    public function getName(){
        return  $this->Name;
    }
    public function getImage(){
        return $this->image;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getCategoriId(){
        return $this->categorieId;
    }
 

    public function setName($newName){
        $this->Name = $newName;
    }
    public function setImage($newImage){
        $this->image = $newImage;
    }
    public function setPrice($newPrice){
        $this->price = $newPrice;
    }
    public function setCategorieId($newCategorieId){
        $this->categorieId = $newCategorieId;
    }
  
}

