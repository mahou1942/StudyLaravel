<?php

class Dog{
    public $age; // 年齡

    public function sayAge(){
        echo "我的年齡 {$this->age} 歲";
    }

}

$myDog = new Dog();

$myDog->age = 1;

$myDog->sayAge();
