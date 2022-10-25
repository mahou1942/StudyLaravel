<?php

class Animal{
    public $name;
    protected $age;
    private $weight;

    public function __construct($name , $age , $weight){
        $this->name = $name;
        $this->age = $age;
        $this->weight = $weight;
    }

    public function animalShowDate(){
        echo "暱稱： $this->name <br>";
        echo "年齡： $this->age <br>";
        echo "體重： $this->weight <br>";
    }

}

class Dog extends Animal{
    public function dogShowDate(){
        echo "暱稱： $this->name <br>";
        echo "年齡： $this->age <br>";
        echo "體重： $this->weight <br>";
    }
}

$myDog = new Dog('dodo' , 3 , '3KG');

// 1.測試自身類別讀取屬性
//$myDog->animalShowDate();

// 2.測試物件可以讀取的屬性
echo $myDog->name;
echo $myDog->age;
echo $myDog->weight;

// 3.測柿子類別可以讀取的屬性
//$myDog->dogShowDate();
