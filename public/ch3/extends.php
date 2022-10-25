<?php

class Animal{
    public $age;

    public function sayAge(){
        echo "我的年齡 {$this->age} 歲";
    }
}


class Dog extends Animal{
    //為空
}

class Cat extends Animal{
    //為空
}

$myDog = new Dog();
$myDog->age = 1;
$myDog->sayAge();

$myCat = new Cat();
$myCat->age = 2;
$myCat->sayAge();
